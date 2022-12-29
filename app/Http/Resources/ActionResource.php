<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Str;

class ActionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid' => Str::uuid(),
//            'quick_replies' => $this->when($this->answers->isNotEmpty(), $this->answers->pluck('answer')),
            'quick_replies' => $this->answers->pluck('answer'),
            'text' => $this->question_title,
            'type' => 'send_msg',
        ];
    }
}
