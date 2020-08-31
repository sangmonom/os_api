<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
Use App\Http\Resources\SubcategoryResource;
Use App\Subcategory;
Use App\Http\Resources\BrandResource;
Use App\Brand;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            "item_id" => $this->id,
            "item_codeno" =>$this->codeno,
            "item_name" => $this->name,
            "item_photo" => url($this->photo), 
            "item_price" =>$this->price,
            "item_discount" =>$this->discount,
            "item_description" =>$this->description,

            "subcategory" => new SubcategoryResource(Subcategory::find($this->subcategory_id)),
            "brand" => new BrandResource(Brand::find($this->brand_id))
        ];
    }
}
