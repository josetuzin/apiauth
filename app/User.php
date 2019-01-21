<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Storage;
//use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $appends = ['avatar_url'];
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'active', 'activation_token',
    ];


    protected $hidden = [
        'password', 'remember_token', 'activation_token',
    ];

    public function getAvatarUrlAttribute()
    {
        return Storage::url('avatars/'.$this->id.'/'.$this->avatar);
    }

}
