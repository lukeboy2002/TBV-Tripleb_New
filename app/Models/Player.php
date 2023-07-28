<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'bio',
        'city',
        'birthday',
        'points',
        'played_games',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
