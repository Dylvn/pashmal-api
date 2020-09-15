<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'address' => $this->address,
            'postalcode' => $this->postalcode,
            'city' => $this->city,
            'admin' => $this->admin,
            '_links' => [
                'self' => route('user_show', ['user' => $this->id], false),
                'modify' => route('user_update', ['user' => $this->id], false),
                'delete' => route('user_destroy', ['user' => $this->id], false),
            ],
            '_embedded' => [
                'orders' => $this->generateOrdersUrl(),
            ],
        ];
    }

    public function generateOrdersUrl()
    {
        $ordersUrl = [];
        foreach ($this->resource->orders as $order) {
            $ordersUrl[] = route('order_show', ['order' => $order->id], false);
        }

        return $ordersUrl;
    }
}
