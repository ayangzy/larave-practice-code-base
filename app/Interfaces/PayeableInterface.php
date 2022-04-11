<?php

namespace App\Interfaces;

interface PayeableInterface
{
     /**
     * pay with required method
     *
     * @return mixed
     */
    public function pay();

}