<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rule_id',
        'phone',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // rule
    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }

    //package
    public function packages()
    {
        return $this->belongsToMany(Package::class)
            ->withPivot('name')
            ->withTimestamps();
    }


    //orders
    public function ordres()
    {
        return $this->hasMany(Order::class);
    }


    //messages
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }


    public function competitiondesigns()
    {
        return $this->belongsToMany(CompetitionDesign::class, 'competitiondesign_user', 'user_id', 'competitiondesign_id')
            ->withPivot('rate')
            ->withTimestamps();
    }
}