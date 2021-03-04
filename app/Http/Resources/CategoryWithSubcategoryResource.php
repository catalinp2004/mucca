<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryWithSubcategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = [];

        foreach ($this->subcategories as $subcat) {
            array_push($options, array("value" => $subcat->id, "text" =>  $subcat->name_ro . ' / ' . $subcat->name_en ));
        }

        return [

            'category' => $this->name_ro . ' / ' . $this->name_en,
            'subcategories' => $options

        ];
    }
}
