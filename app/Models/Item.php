<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'water',
        'shirt',
        'pants',
        'dog',
        'soup',
        'be_developer',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
