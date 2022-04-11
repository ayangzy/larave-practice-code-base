<?php

namespace App\Service;

use App\Models\PaymentMethod;

class PaymentMethodService 
{
    private PaymentMethod $paymentMethod;
    public function __construct(PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }


    public function getAllPaymentMethods()
    {
        return $this->paymentMethod->query()->get();
    }

    public function create(array $attributes)
    {
        return $this->paymentMethod->create([
            'name' => $attributes['name'],
            'description' => $attributes['description']
        ]);
    }

    
}