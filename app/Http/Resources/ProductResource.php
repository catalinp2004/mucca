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
        $filename = ($this->images->count() > 0) ? Storage::url('img/products/'.$this->folder_name.'/'.$this->images->shuffle()->first()['filename']) : asset('img/mucca_placeholder.jpg');
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'product_code' => $this->product_code,
            'name' => $this->name,
            'description' => $this->description,
            'filename' => $filename,
            'first_subcategory' => $subcategory,
            'first_category' => $subcategory->category,
        ];
    }
}
