<?php

namespace App\Http\Resources;

use App\Models\Ciclo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FamiliaProfesionalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return array_merge(
            parent::toArray($request),
            ['ciclos' => $this->ciclos]
        );
    }
}
