<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'song_code',
        'user_id',
        'action',
        'changes',
        'ip_address',
    ];
}
