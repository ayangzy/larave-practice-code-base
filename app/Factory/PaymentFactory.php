<?php

namespace App\Factory;

use Exception;
use App\Payment\PaystackPayment;
use App\Payment\FlutterwavePayment;

class PaymentFactory
{
    public function initializePayment($type)
    {
        switch ($type) {
            case 'paystack':
              return new PaystackPayment();
              break;
            case 'flutterwave':
              return new FlutterwavePayment();
              break;
            default:
              throw new Exception('Unknown payment method');
          }
    }


    // public function initializePayment($type)
    // {
    //     if($type === 'paystack'){
    //         return new PaystackPayment();
    //     }elseif($type === 'flutterwave'){
    //         return new FlutterwavePayment();
    //     }
    //     throw new Exception('Unknown payment method');
    // }
}