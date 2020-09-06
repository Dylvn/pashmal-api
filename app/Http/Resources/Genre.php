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
                'self' => sprintf("/genres/%s", $this->id),
                'modify' => sprintf("/genres/%s", $this->id),
                'delete' => sprintf("/genres/%s", $this->id),
            ],
        ];
    }
}
