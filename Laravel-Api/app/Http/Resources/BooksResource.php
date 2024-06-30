<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'publication_year' => $this->publication_year,
            'author_name' => $this->authors->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}