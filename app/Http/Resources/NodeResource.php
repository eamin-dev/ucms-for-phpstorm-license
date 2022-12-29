<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

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
        $stdcls = new \stdClass();
        $stdcls->uuid = Str::uuid();
//        $stdcls->uuid = Str::uuid();

        return [
            'uuid' => $this->uuid,
//            'actions' => ActionResource::collection($this),
            'actions' => [
                new ActionResource($this)
            ],
            'exits' => [
                $stdcls
            ],
        ];
    }
}
