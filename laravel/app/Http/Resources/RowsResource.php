<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RowsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = [];
        foreach ($this as $item) {
            foreach ($item as $row) {
                $array[] = [
                    'id' => $row->id,
                    'name' => $row->name,
                ];
            }
        }

        return $array;
    }
}
