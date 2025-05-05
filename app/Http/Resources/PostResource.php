<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "post_id"=>$this->id,
            "post_title"=> $this->title,
            "post_body"=> $this->body,
            "post_author"=> new UserResource($this->user),
        ];
    }
}
