<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Api extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' =>$this->id,
            'title' =>$this->title,
            'user_id' =>$this->user_id,
            'albume_id'=>$this->albume_id
        ];
    }
}
