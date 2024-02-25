<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    use HasFactory;

    protected $fillable = ['pemilih_id', 'kandidat_id', 'jabatan_id', 'periode'];

    public function kandidat()
    {
        return $this->hasMany(Kandidat::class);
    }

    public function pemilih()
    {
        return $this->belongsTo(Pemilih::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
