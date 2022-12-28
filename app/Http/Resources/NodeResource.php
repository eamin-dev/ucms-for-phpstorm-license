<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NodeResource extends JsonResource
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
            'actions' => [
                'quick_replies' => $this->when($this->answers->isNotEmpty(), $this->answers->pluck('answer')),
                'text' => $this->question_title,
                'type' => 'send_msg',
                'uuid' => $this->uuid,
            ],
//            'exits' => [],
            'uuid' => $this->uuid,
        ];
    }
}
