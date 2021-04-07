<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetitionDesign extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function Competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'competitiondesign_user', 'competitiondesign_id', 'user_id')
            ->withPivot('rate')
            ->withTimestamps();
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

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
