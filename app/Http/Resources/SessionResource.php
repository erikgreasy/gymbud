<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $exercises = $this->records->map(fn ($record) => $record->exercise)->unique();

        return parent::toArray($request) + [
            'exercises' => $exercises,
        ];
    }
}
