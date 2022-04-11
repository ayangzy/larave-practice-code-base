<?php

namespace App\Payment;

use App\Interfaces\PayeableInterface;

class PaystackPayment implements PayeableInterface
{
   
    public function baseUri()
    {
        return config('paystack.baseUrl');
    }

    public function pay()
    {
        return "Paystack payment logic goes here";
    }
}