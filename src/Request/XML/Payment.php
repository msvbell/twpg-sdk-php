<?php
/**
 * Copyright (c) 2017 Compassplus LTD. All rights reserved.
 * Licensed under the MIT license. See LICENSE file in the project root for details.
 */

namespace Compassplus\Sdk\Request\XML;

use Compassplus\Sdk\BaseOrder;
use Compassplus\Sdk\OrderPayment;
use Compassplus\Sdk\Request\DataProvider;
use Compassplus\Sdk\Service;
use UnexpectedValueException;
use function str_replace;

/**
 * Class Payment
 * @package Compassplus\Request\XML
 */
class Payment extends DataProvider
{

    /**
     * @return mixed|string
     */
    public function getRequestData()
    {
        $service = new Service();
        $requestBody = [
            'Request' => [
                'Operation' => 'CreateOrder',
                'Language' => $this->operation->merchant->getLanguage(),
                'Order' => [
                    'OrderType' => 'Payment',
                    'Merchant' => $this->operation->merchant->getId(),
                    'Amount' => $this->operation->order->getAmount(),
                    'Currency' => $this->operation->order->getCurrency(),
                    'Description' => $this->operation->order->getDescription(),
                    'ApproveURL' => $this->operation->merchant->getApproveUrl(),
                    'CancelURL' => $this->operation->merchant->getCancelUrl(),
                    'DeclineURL' => $this->operation->merchant->getDeclineUrl()
                ]
            ]
        ];

        if (!empty($this->operation->customer->getEmail())) {
            $requestBody['Request']['Order']['email'] = $this->operation->customer->getEmail();
        }
        if (!empty($this->operation->customer->getPhone())) {
            $requestBody['Request']['Order']['phone'] = $this->operation->customer->getPhone();
        }
        $requestBody['Request']['Order']['AddParams'] = $this->getAddParams($this->operation->order);

        $xml = $service->write('TKKPG', $requestBody);

        if ($xml) {
            return $xml;
        }

        throw new UnexpectedValueException('XML is not generated');
    }

    /**
     * @param BaseOrder $orderExt
     * @return array
     */
    public function getAddParams(BaseOrder $orderExt)
    {
        if ($orderExt instanceof OrderPayment) {
            $addParams = array();
            $addParams['VendorID'] = $orderExt->getVendorId();
            $addPaymentParams = $orderExt->getPaymentParams();
            $addPaymentParams = str_replace(array('/', "\\"), array("\/", "\\\\"), $addPaymentParams);
            if (!empty($addPaymentParams)) {
                $addParamList = '';
                foreach ($addPaymentParams as $paramData) {
                    if (!empty($addParamList)) {
                        $addParamList .= '/';
                    }
                    $addParamList .= $paramData;
                }
                $addParams['PaymentParams'] = $addParamList;
            }
            return $addParams;
        }
        return [];
    }
}
