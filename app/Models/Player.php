<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'username',
        'image',
        'bio',
        'city',
        'birthday',
        'active',
        'points',
        'played_games',
        'won_games',
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function age()
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }
}
