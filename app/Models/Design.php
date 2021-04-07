<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Design extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //category
    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }

    //design imgs
    public function designImgs()
    {
        return $this->hasMany(Designimg::class);
    }

    //design rates
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }


    //orders
    public function ordres()
    {
        return $this->hasMany(Order::class);
    }

    public function name($lang = null)
    {
        $lang = $lang ?? App::getLocale();
        return json_decode($this->name)->$lang;
    }

    public function desc($lang = null)
    {
        $lang = $lang ?? App::getLocale();
        return json_decode($this->desc)->$lang;
    }

    public function lang($lang = null)
    {
        $lang = $lang ?? App::getLocale();
        return json_decode($this->lang)->$lang;
    }

    public function font($lang = null)
    {
        $lang = $lang ?? App::getLocale();
        return json_decode($this->font)->$lang;
    }

    public function color($lang = null)
    {
        $lang = $lang ?? App::getLocale();
        return json_decode($this->color)->$lang;
    }


    public function details($lang = null)
    {
        $lang = $lang ?? App::getLocale();
        return json_decode($this->details)->$lang;
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
