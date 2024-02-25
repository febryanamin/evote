<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pemilih', 'no_kta', 'jk', 'section', 'jabatan_id', 'status'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function suara()
    {
        return $this->hasMany(Suara::class);
    }

    public function golput()
    {
        return $this->hasMany(Golput::class);
    }
}
