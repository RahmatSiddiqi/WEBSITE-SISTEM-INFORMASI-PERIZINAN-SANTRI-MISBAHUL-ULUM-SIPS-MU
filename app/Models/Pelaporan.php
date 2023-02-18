<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'perizinan_id', 'tgl_balik', 'keterangan',
    ];

    public function perizinan()
    {
        return $this->belongsTo(Perizinan::class);
    }

    public function user()
    {
        return $this->belongsTo(Pelaporan::class);
    }
}
