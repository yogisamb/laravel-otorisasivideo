<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relasivideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_id',
        'user_id',
        'timeup',
        'durasi',
    ];

    public function Video()
    {
        return $this->belongsTo(Video::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
