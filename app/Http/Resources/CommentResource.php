<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'comment'=>$this->comment,
            'post'=>$this->post->title,
            'userName'=>$this->user->name,
            'createdAt' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'updatedAt' => Carbon::parse($this->updated_at)->format('Y-m-d'),
            
        ];   
    }
}
