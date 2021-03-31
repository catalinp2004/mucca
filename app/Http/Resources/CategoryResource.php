<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name_ro' => $this->name_ro,
            'name_en' => $this->name_en,
            'subcategories' => SubcategoryResource::collection($this->subcategories)
        ];

    }
}
