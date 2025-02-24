<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IdiomaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $infoUsuarios = $this->users->map(function ($user) {
            return [
                'id' => $user->id
            ];
        });

        return array_merge(
            parent::toArray($request),
            ['users' => $infoUsuarios]
        );
    }
}
