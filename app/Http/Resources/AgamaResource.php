<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgamaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'agama' => $this->agama,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}