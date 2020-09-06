<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Genre extends JsonResource
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
            '_links' => [
                'self' => sprintf('/genres/%s', $this->id),
                'modify' => sprintf('/genres/%s', $this->id),
                'delete' => sprintf('/genres/%s', $this->id),
            ],
            '_embedded' => [
                'books' => $this->generateBooksUrl(),
            ],
        ];
    }

    public function generateBooksUrl() : array
    {
        $booksUrl = [];
        foreach ($this->resource->books as $book) {
            $booksUrl[] = sprintf('/books/%s', $book->id);
        }

        return $booksUrl;
    }
}
