<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Question extends JsonResource
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
            'title' => mb_strimwidth($this->title,0,5,'...'),
            'question' => $this->question,
            'poll_id' => $this->poll_id
        ];
    }
}
