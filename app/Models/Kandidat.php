<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kandidat', 'periode', 'visi', 'misi', 'foto'];

    public function suara()
    {
        return $this->hasOne(Suara::class);
    }
}
