<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'slug' => $this->slug,
            'product_code' => $this->product_code,
            'name' => $this->name,
            'description' => $this->description,
            'filename' => '/'.$this->folder_name.'/'.$this->images->first()['filename'],
            'colors' => ColorResource::collection($this->colors)
        ];
    }
}
