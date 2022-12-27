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
                'text'=> $this->question_title,
                'type'=> 'send_msg',
                'uuid'=> encrypt($this->id)
            ],
            'exits' => [],
            'uuid' => encrypt($this->id)
        ];
    }
}
