<?php

namespace App\Http\Controllers;

use App\Service\PaymentMethodService;
use App\Http\Requests\PaymentMethodRequest;
use Illuminate\Http\JsonResponse;

class PaymentMethodController extends Controller
{
    private PaymentMethodService $paymentMethodService;

    public function __construct(PaymentMethodService $paymentMethodService)
    {
        $this->paymentMethodService = $paymentMethodService;
    }

    public function index()
    {
        
        $paymentMethods = $this->paymentMethodService->getAllPaymentMethods();
        return response()->json(['data' => $paymentMethods], 200);
    }

    public function store(PaymentMethodRequest $request): JsonResponse
    {
        $paymentMethod = $this->paymentMethodService->create($request->validated());
        return response()->json(['data' => $paymentMethod], 201);
    }
}
