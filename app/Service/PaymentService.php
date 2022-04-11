<?php

namespace App\Service;

use Illuminate\Http\Request;
use App\Factory\PaymentFactory;

class PaymentService
{
    public function processPayment(Request $request)
    {
        $paymentFactory = new PaymentFactory();
        $payment = $paymentFactory->initializePayment($request->type)->pay();
        return $payment;
    }
}