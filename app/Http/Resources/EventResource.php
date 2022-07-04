<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        if ($request->query('id')) {
            return [
                'id' => $this->day->id,
                'day' => $this->day->name,
                'image' => $this->images

            ];
        }
        return [
            'id' => $this->day->id,
            'day' => $this->day->name,
            'image' => $this->images[0]

        ];
    }
}
