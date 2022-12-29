<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FlowResource extends JsonResource
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
            'name' => $this->file_id,
            'uuid' => $this->uuid,
            'spec_version' => '13.1.0',
            'language' => 'eng',
            'type' => 'messaging',
            'nodes' => NodeResource::collection($this->questions),
//            '_ui' => $this->ui,
        ];
    }
}
