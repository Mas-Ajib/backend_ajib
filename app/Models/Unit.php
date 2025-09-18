<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';
    protected $fillable = ['unit'];

    public function subunits(): HasMany
    {
        return $this->hasMany(Subunit::class, 'unit_id');
    }
}