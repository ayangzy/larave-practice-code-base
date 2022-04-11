<?php

namespace App\Payment;

use App\Interfaces\PayeableInterface;

class FlutterwavePayment implements PayeableInterface
{
    public function pay()
    {
        return "Flutterwave payment logic goes here";
    }
}