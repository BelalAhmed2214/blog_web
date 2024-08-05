<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
class ReplyResource extends JsonResource
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
            'reply'=>$this->reply,
            'comment'=>$this->comment->comment,
            'createdAt' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'updatedAt' => Carbon::parse($this->updated_at)->format('Y-m-d'),
            
        ];   
    }
}
