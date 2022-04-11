<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\PaymentService;

class paymentController extends Controller
{
    private PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }


    public function initiatePayment(Request $request)
    {
       $payment = $this->paymentService->processPayment($request);
       return $payment;
    }
}
