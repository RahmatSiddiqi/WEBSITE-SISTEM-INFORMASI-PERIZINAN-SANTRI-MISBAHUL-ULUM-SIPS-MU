<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'santri_id', 'tgl_pulang', 'tgl_balik', 'alasan_izin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function pelaporan()
    {
        return $this->hasOne(Pelaporan::class);
    }
}
