<?php  //[STAMP] ca45679e9462bf911d0ba3969d15244a
namespace _generated;

// This class was automatically generated by build task
// You should not change it manually as it will be overwritten on next build
// @codingStandardsIgnoreFile

use Codeception\Module\Asserts;

/**
 * Trait UnitTesterActions
 * @package _generated
 */
trait UnitTesterActions
{
    /**
     * @return \Codeception\Scenario
     */
    abstract protected function getScenario();


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that two variables are equal. If you're comparing floating-point values,
     * you can specify the optional "delta" parameter which dictates how great of a precision
     * error are you willing to tolerate in order to consider the two values equal.
     *
     * Regular example:
     * ```php
     * <?php
     * $I->assertEquals($element->getChildrenCount(), 5);
     * ```
     *
     * Floating-point example:
     * ```php
     * <?php
     * $I->assertEquals($calculator->add(0.1, 0.2), 0.3, 'Calculator should add the two numbers correctly.', 0.01);
     * ```
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @param float $delta
     * @see \Codeception\Module\Asserts::assertEquals()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertEquals($expected, $actual, $message = null, $delta = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertEquals', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that two variables are not equal. If you're comparing floating-point values,
     * you can specify the optional "delta" parameter which dictates how great of a precision
     * error are you willing to tolerate in order to consider the two values not equal.
     *
     * Regular example:
     * ```php
     * <?php
     * $I->assertNotEquals($element->getChildrenCount(), 0);
     * ```
     *
     * Floating-point example:
     * ```php
     * <?php
     * $I->assertNotEquals($calculator->add(0.1, 0.2), 0.4, 'Calculator should add the two numbers correctly.', 0.01);
     * ```
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @param float $delta
     * @see \Codeception\Module\Asserts::assertNotEquals()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertNotEquals($expected, $actual, $message = null, $delta = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotEquals', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that two variables are same
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertSame()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertSame($expected, $actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertSame', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that two variables are not same
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertNotSame()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertNotSame($expected, $actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotSame', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that actual is greater than expected
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertGreaterThan()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertGreaterThan($expected, $actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertGreaterThan', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that actual is greater or equal than expected
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertGreaterThanOrEqual()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertGreaterThanOrEqual($expected, $actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertGreaterThanOrEqual', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that actual is less than expected
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertLessThan()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertLessThan($expected, $actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertLessThan', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that actual is less or equal than expected
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertLessThanOrEqual()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertLessThanOrEqual($expected, $actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertLessThanOrEqual', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that haystack contains needle
     *
     * @param        $needle
     * @param        $haystack
     * @param string $message
     * @see \Codeception\Module\Asserts::assertContains()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertContains($needle, $haystack, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertContains', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that haystack doesn't contain needle.
     *
     * @param        $needle
     * @param        $haystack
     * @param string $message
     * @see \Codeception\Module\Asserts::assertNotContains()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertNotContains($needle, $haystack, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotContains', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that string match with pattern
     *
     * @param string $pattern
     * @param string $string
     * @param string $message
     * @see \Codeception\Module\Asserts::assertRegExp()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertRegExp($pattern, $string, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertRegExp', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that string not match with pattern
     *
     * @param string $pattern
     * @param string $string
     * @param string $message
     * @see \Codeception\Module\Asserts::assertNotRegExp()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertNotRegExp($pattern, $string, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotRegExp', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that a string starts with the given prefix.
     *
     * @param string $prefix
     * @param string $string
     * @param string $message
     * @see \Codeception\Module\Asserts::assertStringStartsWith()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertStringStartsWith($prefix, $string, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertStringStartsWith', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that a string doesn't start with the given prefix.
     *
     * @param string $prefix
     * @param string $string
     * @param string $message
     * @see \Codeception\Module\Asserts::assertStringStartsNotWith()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertStringStartsNotWith($prefix, $string, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertStringStartsNotWith', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that variable is empty.
     *
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertEmpty()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertEmpty($actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertEmpty', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that variable is not empty.
     *
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertNotEmpty()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertNotEmpty($actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotEmpty', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that variable is NULL
     *
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertNull()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertNull($actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNull', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that variable is not NULL
     *
     * @param        $actual
     * @param string $message
     * @see \Codeception\Module\Asserts::assertNotNull()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertNotNull($actual, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotNull', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that condition is positive.
     *
     * @param        $condition
     * @param string $message
     * @see \Codeception\Module\Asserts::assertTrue()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertTrue($condition, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertTrue', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that condition is negative.
     *
     * @param        $condition
     * @param string $message
     * @see \Codeception\Module\Asserts::assertFalse()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertFalse($condition, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertFalse', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks if file exists
     *
     * @param string $filename
     * @param string $message
     * @see \Codeception\Module\Asserts::assertFileExists()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertFileExists($filename, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertFileExists', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks if file doesn't exist
     *
     * @param string $filename
     * @param string $message
     * @see \Codeception\Module\Asserts::assertFileNotExists()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertFileNotExists($filename, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertFileNotExists', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $expected
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertGreaterOrEquals()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertGreaterOrEquals($expected, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertGreaterOrEquals', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $expected
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertLessOrEquals()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertLessOrEquals($expected, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertLessOrEquals', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertIsEmpty()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertIsEmpty($actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertIsEmpty', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $key
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertArrayHasKey()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertArrayHasKey($key, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertArrayHasKey', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $key
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertArrayNotHasKey()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertArrayNotHasKey($key, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertArrayNotHasKey', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that array contains subset.
     *
     * @param array $subset
     * @param array $array
     * @param bool $strict
     * @param string $message
     * @see \Codeception\Module\Asserts::assertArraySubset()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertArraySubset($subset, $array, $strict = null, $message = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertArraySubset', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $expectedCount
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertCount()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertCount($expectedCount, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertCount', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $class
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertInstanceOf()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertInstanceOf($class, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertInstanceOf', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $class
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertNotInstanceOf()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertNotInstanceOf($class, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertNotInstanceOf', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $type
     * @param $actual
     * @param $description
     * @see \Codeception\Module\Asserts::assertInternalType()
     * @return mixed|null
     * @throws \Exception
     */
    public function assertInternalType($type, $actual, $description = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('assertInternalType', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Fails the test with message.
     *
     * @param $message
     * @see \Codeception\Module\Asserts::fail()
     * @return mixed|null
     * @throws \Exception
     */
    public function fail($message) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('fail', func_get_args()));
    }


    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Handles and checks exception called inside callback function.
     * Either exception class name or exception instance should be provided.
     *
     * ```php
     * <?php
     * $I->expectException(MyException::class, function() {
     *     $this->doSomethingBad();
     * });
     *
     * $I->expectException(new MyException(), function() {
     *     $this->doSomethingBad();
     * });
     * ```
     * If you want to check message or exception code, you can pass them with exception instance:
     * ```php
     * <?php
     * // will check that exception MyException is thrown with "Don't do bad things" message
     * $I->expectException(new MyException("Don't do bad things"), function() {
     *     $this->doSomethingBad();
     * });
     * ```
     *
     * @param $exception string or \Exception
     * @param $callback
     * @see \Codeception\Module\Asserts::expectException()
     * @return mixed|null
     * @throws \Exception
     */
    public function expectException($exception, $callback) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('expectException', func_get_args()));
    }
}
