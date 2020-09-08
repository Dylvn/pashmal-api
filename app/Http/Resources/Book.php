<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
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
            'name' => $this->name,
            'author' => $this->author,
            'description' => $this->description,
            'price' => $this->price,
            'available' => $this->available,
            '_links' => [
                'self' => route('book_show', ['book' => $this->id], false),
                'modify' => route('book_update', ['book' => $this->id], false),
                'delete' => route('book_destroy', ['book' => $this->id], false),
            ],
            '_embedded' => [
                'genres' => $this->generateGenresUrl(),
                'orders' => $this->generateOrdersUrl(),
            ],
        ];
    }

    public function generateGenresUrl() : array
    {
        $genresUrl = [];
        foreach ($this->resource->genres as $genre) {
            // TODO modify when routes genres will be created.
            $genresUrl[] = sprintf('/api/genres/%s', $genre->id);
        }

        return $genresUrl;
    }

    public function generateOrdersUrl() : array
    {
        $ordersUrl = [];
        foreach ($this->resource->orders as $order) {
            // TODO modify when routes orders will be created.
            $ordersUrl[] = sprintf('/api/genres/%s', $order->id);
        }

        return $ordersUrl;
    }
}
