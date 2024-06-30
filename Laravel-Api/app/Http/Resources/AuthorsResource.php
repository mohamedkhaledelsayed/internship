<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorsResource extends JsonResource
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
            'type'=> 'authors',
            'attributes' => [
                'name' => $this->name,
                'age' => $this->age,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
            ];
    }
}