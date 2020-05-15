<?php

use Compassplus\Sdk\Connector;
use Compassplus\Sdk\Customer;
use Compassplus\Sdk\Customer\Address;
use Compassplus\Sdk\Merchant;
use Compassplus\Sdk\Order;
use Compassplus\Sdk\Payment;

require 'vendor/autoload.php';


$order = new Order();
$order->setCurrency(643);
$order->setAmount(100);
$order->setDescription('Test');
$merchant = new Merchant();
$merchant->setLanguage('RU');
$merchant->setMerchantId('DMTOY');
$address = new Address();
$customer = new Customer($address);
$connector = new Connector('ipay.genbank.ru', '8444', '/exec');
$connector->debug();
//$connector->setCert('www.sevvodokanal.org.ru.crt');
//$connector->setKey('sevvodokanal.key', '3bQM!gZ6');

$connector->setCert('new_dm.crt');
$connector->setKey('dm.key', 'Z31HqD0jBuDM38B1DNee');


$pu = new Payment($order, $merchant, $customer, $connector);

try {
    $sd = $pu->purchase();
    print_r($sd);
    echo $sd->getPaymentUrl();
} catch (Exception $e) {
}

