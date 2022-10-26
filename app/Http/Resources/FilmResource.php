<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'year' => $this->year,
            'text' => $this->text,
            'user_id' => $this->user_id,
            'actors' => ActorResource::collection($this->actors),
            'genres' => GenreResource::collection($this->genres),
        ];
    }
}
