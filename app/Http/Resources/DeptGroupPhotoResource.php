<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeptGroupPhotoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        if ($request->query('school')) {

            return [
                'school' => $this['school'],
                'images' => $this['images']
            ];
        } else {
            return [
                'dept' => $this->department,
                'images' => $this->images
            ];
        }
    }
}
