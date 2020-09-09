<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
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
            'billing_address' => $this->billing_address,
            'billing_postalcode' => $this->billing_postalcode,
            'billing_city' => $this->billing_city,
            'delivery_address' => $this->delivery_city,
            'delivery_postalcode' => $this->delivery_postalcode,
            'delivery_city' => $this->delivery_city,
            'ttc_price' => $this->ttc_price,
            'ht_price' => $this->ht_price,
            'user_id' => $this->user->id,
            '_links' => [
                'self' => route('order_show', ['order' => $this->id], false),
                'modify' => route('order_update', ['order' => $this->id], false),
                'delete' => route('order_destroy', ['order' => $this->id], false),
            ],
            '_embedded' => [
                'books' => $this->generateBooksUrl(),
                'user' => sprintf('/api/users/%s', $this->user->id), // TODO change to route when users route will be created.
            ],
        ];
    }

    public function generateBooksUrl() : array
    {
        $booksUrl = [];
        foreach ($this->resource->books as $book) {
            $booksUrl[] = route('book_show', ['book' => $book->id], false);
        }

        return $booksUrl;
    }
}
