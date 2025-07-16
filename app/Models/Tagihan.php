<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihan';

    protected $fillable = [
        'user_id',
        'nama_tagihan',
        'tipe_tagihan',
        'jumlah',
        'jatuh_tempo',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
