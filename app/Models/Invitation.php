<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'invited_by',
        'invitation_token',
        'registered_at',
    ];

    /**
     * Generates a new invitation token.
     *
     * @return bool|string
     */
    public function generateInvitationToken()
    {
        $this->invitation_token = substr(md5(rand(0, 9).$this->email.time()), 0, 32);
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return urldecode(route('user.create').'?invitation_token='.$this->invitation_token);
    }
}
