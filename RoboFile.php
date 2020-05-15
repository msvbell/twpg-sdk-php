<?php
/**
 * Copyright (c) 2017 Skytech LLC. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

use Compassplus\Sdk\Order;
use Robo\Result;
use Robo\Tasks;
use Symfony\Component\Finder\Finder;

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends Tasks
{
    public function testAll()
    {
        $this->taskCodecept()
            ->suite('unit')
            ->xml()
            ->html()
            ->run();
    }

    public function versionPatch()
    {
        $this->taskSemVer('.semver')
            ->increment()
            ->run();
    }

    public function versionMinor()
    {
        $this->taskSemVer('.semver')
            ->increment('minor')
            ->run();
    }

    public function versionMajor()
    {
        $this->taskSemVer('.semver')
            ->increment('major')
            ->run();
    }

    public function versionPrerelease()
    {
        $this->taskSemVer('.semver')
            ->prerelease()
            ->run();
    }

    /*
     * @calls test:all*/
    public function publishDev()
    {
        $this->taskGitStack()
            ->stopOnFail()
            ->push('origin', 'develop')->run();
    }

    public function publishProd()
    {
        $this->taskGitStack()
            ->stopOnFail()
            ->push('origin', 'master')
            ->run();
    }

    public function buildPhar()
    {
        $this->checkPharReadonly();

        $this->taskComposerDumpAutoload('composer')
            ->optimize()
            ->noDev()
            ->run();

        $collection = $this->collectionBuilder();

        $workDir = "build";
        $roboBuildDir = "$workDir/bobo";

        // Before we run `composer install`, we will remove the dev
        // dependencies that we only use in the unit tests.  Any dev dependency
        // that is in the 'suggested' section is used by a core task;
        // we will include all of those in the phar.
        $devProjectsToRemove = $this->devDependenciesToRemoveFromPhar();

        $this->taskReplaceInFile('vendor/consolidation/robo/src/Task/Development/PackPhar.php')
            ->from('if (count($this->files) > 1000) {')
            ->to('if (count($this->files) > 10000) {')
            ->run();

        // We need to create our work dir and run `composer install`
        // before we prepare the pack phar task, so create a separate
        // collection builder to do this step in.
        $prepTasks = $this->collectionBuilder();


        $preparationResult = $prepTasks
            ->taskFilesystemStack()
            ->mkdir($workDir)
            ->taskRsync()
            ->fromPath(
                [
                    __DIR__ . '/composer.json',
                    __DIR__ . '/src'
                ]
            )
            ->toPath($roboBuildDir)
            ->recursive()
            ->progress()
            ->stats()
            ->taskComposerRemove('composer')
            ->dir($roboBuildDir)
            ->dev()
            ->noUpdate()
            ->args($devProjectsToRemove)
            ->taskComposerInstall('composer')
            ->dir($roboBuildDir)
            ->noScripts()
            ->run();

        // Exit if the preparation step failed
        if (!$preparationResult->wasSuccessful()) {
            return $preparationResult;
        }

        // Decide which files we're going to pack
        $files = Finder::create()->ignoreVCS(true)
            ->files()
            ->name('*.php')
            ->name('cacert.pem')
            ->path('src')
            ->path('vendor')
            ->notPath('docs')
            ->notPath('/vendor\/.*\/[Tt]est/')
            ->in(is_dir($roboBuildDir) ? $roboBuildDir : __DIR__);

        foreach ($files as $file) {
            $collection->taskReplaceInFile($file->getRelativePathname())
                ->regex('/^\n/m')
                ->to('');
        }

        $phar = $collection->taskPackPhar('/app/package/cp-twpg-sdk.phar')
            ->compress()
            ->stub('package/stub.php');

        foreach ($files as $file) {
            $phar->addStripped($file->getRelativePathname(), $file->getRealPath());
        }

        $collection->run();

        // ???
        require_once 'package/cp-twpg-sdk.phar';
        $test = new Order();
        $test->setAmount(100);
        $this->say('Amount is ' . $test->getAmount());
        if ($test->getAmount() === 100 * 100) {
            return Result::success($collection, 'Phar compiled');
        }

        return Result::error($collection, 'Error phar build');
    }

    /**
     * The phar:build command removes the project requirements from the
     * 'require-dev' section that are not in the 'suggest' section.
     *
     * @return array
     */
    protected function devDependenciesToRemoveFromPhar()
    {
        $composerInfo = (array)json_decode(file_get_contents(__DIR__ . '/composer.json'));

        $devDependencies = array_keys((array)$composerInfo['require-dev']);
        return $devDependencies;
    }

    protected function checkPharReadonly()
    {
        if (ini_get('phar.readonly')) {
            throw new Exception('Must set "phar.readonly = Off" in php.ini to build phars.');
        }
    }

    public function addcacert()
    {
        $caFile = file_get_contents('https://curl.haxx.se/ca/cacert.pem');
        $this->taskWriteToFile('src/cacert.pem')->text($caFile)->run();
    }

    public function build()
    {
        $this->stopOnFail(true);
        $this->testAll();
        $this->taskExec('docker-compose up --build build')->run();
    }
}
