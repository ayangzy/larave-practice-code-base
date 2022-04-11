<?php

namespace App\Repositories;

use App\Models\Order;
use App\Interfaces\OrderRepositoryInterface;


class OrderRepository implements OrderRepositoryInterface 
{
    private Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    public function getAllOrders() 
    {
        return $this->order::query()->get();
    }

    public function getOrderById($orderId) 
    {
        return $this->order::findOrFail($orderId);
    }

    public function deleteOrder($orderId) 
    {
        $this->order::destroy($orderId);
    }

    public function createOrder(array $orderDetails) 
    {
        return $this->order::create($orderDetails);
    }

    public function updateOrder($orderId, array $newDetails) 
    {
        return $this->order::whereId($orderId)->update($newDetails);
    }

    public function getFulfilledOrders() 
    {
        return $this->order::where('is_fulfilled', true);
    }
}