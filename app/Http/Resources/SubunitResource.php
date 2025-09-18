<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubunitResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'unit_id' => $this->unit_id,
            'unit' => $this->unit->unit ?? null,
            'subunit' => $this->subunit,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}