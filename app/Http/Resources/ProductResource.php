<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

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
        $subcategory = $this->subcategories->first();
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'product_code' => $this->product_code,
            'name' => $this->name,
            'description' => $this->description,
            'filename' => Storage::url('img/products/'.$this->folder_name.'/'.$this->images->first()['filename']),
            'first_subcategory' => $subcategory->name_ro,
            'first_category' => $subcategory->category->name_ro,
        ];
    }
}
