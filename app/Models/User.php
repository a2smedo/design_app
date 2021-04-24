<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\App;
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
        'package_id',
        'phone',
        'type',
        'status'

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

    // rule
    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }

    public function package_name($lang=null)
    {
        //return json_decode($this->package->name);

        $lang = $lang ?? App::getLocale();
        return json_decode($this->package->name)->$lang;
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
        return $this->belongsToMany(CompetitionDesign::class, 'competition_design_user', 'user_id', 'competition_design_id')
            ->withPivot('rate')
            ->withTimestamps();
    }
}
