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
                'self' => route('genre_show', ['genre' => $this->id], false),
                'modify' => route('genre_update', ['genre' => $this->id], false),
                'delete' => route('genre_destroy', ['genre' => $this->id], false),
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
            $booksUrl[] = route('book_show', ['book' => $book->id], false);
        }

        return $booksUrl;
    }
}
