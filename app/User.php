<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function card(){
        return $this->hasOne(\App\Card::class);
    }
    public function borrowed(){
        return $this->belongsToMany('\App\Book', 'borrowed_by_user','user_id', 'book_id')->withPivot(['return_date', 'return_date']);;
    }
    public function reserved(){
        return $this->belongsToMany('\App\Book', 'reserved_by_user')->withPivot(['reserve_date', 'status', 'return_date']);
    }
    public function overdue(){
        return $this->belongsToMany('\App\Book', 'overdue_from_user', 'user_id', 'book_id' )->withPivot(['over_since', 'penality']);
    }

    protected static function booted(){
        static::created(function($user){
            \App\Card::create([
              'card_number' => strval(rand(1000,9999)).'-'.strval(rand(1000,9999)),
              'expires_on' =>   Carbon::now()->addYears(3),
              'user_id' => $user->id
            ]);
        });
    }
}
