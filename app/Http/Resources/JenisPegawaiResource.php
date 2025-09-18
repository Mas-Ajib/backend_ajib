<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JenisPegawaiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'jenis_pegawai' => $this->jenis_pegawai,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}