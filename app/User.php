<?php

namespace Atomix;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Overtrue\LaravelFollow\Traits\CanLike;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, CanLike;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function atoms()
    {
        return $this->hasMany('Atomix\Atom');
    }
}
