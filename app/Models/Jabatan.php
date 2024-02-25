<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_jabatan', 'persentase'];

    public function pemilih()
    {
        return $this->hasMany(Pemilih::class);
    }

    public function suara()
    {
        return $this->hasOne(Suara::class)->where('periode',date('Y'));
    }
}
