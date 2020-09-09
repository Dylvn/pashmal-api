<?php

namespace App\Services;

use App\Order;

class OrderManager
{
    public function calculatePrices(Order $order) : void
    {
        $this->calculateHtPrice($order);
        $this->calculateTtcPrice($order);

        $order->save();
    }

    private function calculateHtPrice(Order $order) : void
    {
        $htPrice = 0;
        foreach ($order->books as $book) {
            $htPrice += $book->price;
        }

        $order->ht_price = $htPrice;
    }

    private function calculateTtcPrice(Order $order) : void
    {
        $order->ttc_price = $order->ht_price * 1.196;
    }
}
