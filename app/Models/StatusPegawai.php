<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusPegawai extends Model
{
    use HasFactory;

    protected $table = 'status_pegawais';
    protected $fillable = ['jenis_pegawai_id', 'status_pegawai'];

    public function jenisPegawai(): BelongsTo
    {
        return $this->belongsTo(JenisPegawai::class, 'jenis_pegawai_id');
    }

    // Scope untuk filter
    public function scopeFilterByJenisPegawai($query, $jenisPegawaiId)
    {
        if ($jenisPegawaiId) {
            return $query->where('jenis_pegawai_id', $jenisPegawaiId);
        }
        return $query;
    }
}