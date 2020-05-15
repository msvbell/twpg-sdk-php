# PHP Payment SDK #

## Usage
Purchase
```php
$order = new \Compassplus\Sdk\Order();
$order->setAmount(100);
$order->setCurrency(643); //Russian rubles. ISO 4217 numeric-3
$order->setDescription("Test description");

$merchant = new \Compassplus\Sdk\Merchant();
$merchant->setLanguage('RU'); // ISO 639-1
$merchant->setMerchantId("ES000000");
$merchant->setApproveUrl($approveUrl);
$merchant->setCancelUrl($cancelUrl);
$merchant->setDeclineUrl($declineUrl);

$address = new \Compassplus\Sdk\Customer\Address();
$address->setCountry(643); // ISO 3166-1 numeric
$address->setRegion("Moscow");
$address->setCity("Moscow");
$address->setAddressline("evergreen street");
$address->setZip("123123");

$customer = new \Compassplus\Sdk\Customer($address);
$customer->setEmail($email);
$customer->setPhone($phone);
$customer->setIp($clientIp);

$connector = new \Compassplus\Sdk\Connector();
$connector->setCert('C:\Payment_php_sdk\test.pem', ''); // Path to the client certificate
$payment = new \Compassplus\Sdk\Payment($order, $merchant, $customer, $connector);
try {
    $response = $payment->purchase();
} catch (Exception $e) {
    echo $e->getMessage();
}

$url = $response->getPaymentUrl(); // Redirect client to payment page by this url
header('Location: ' . $url);
```
## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
