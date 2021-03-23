<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
