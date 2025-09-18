<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatusPegawaiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'jenis_pegawai_id' => $this->jenis_pegawai_id,
            'jenis_pegawai' => $this->jenisPegawai->jenis_pegawai ?? null,
            'status_pegawai' => $this->status_pegawai,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}