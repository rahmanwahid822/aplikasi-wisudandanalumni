<?php

namespace App\Models;
<<<<<<< HEAD
use App\Models\Datawisuda;
=======
>>>>>>> 838d85f56c3c2d18410342f6bc99162718c6d261
use App\Models\Datayudisium;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        protected $guarded = ['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function datayudisium()
    {
<<<<<<< HEAD
        return $this->hasOne(Datayudisium::class);
    }

    public function datawisuda()
    {
        return $this->hasOne(Datawisuda::class);
=======
        return $this->hasMany(Datayudisium::class);
>>>>>>> 838d85f56c3c2d18410342f6bc99162718c6d261
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
