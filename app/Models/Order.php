<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //user_order
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //design_order
    public function design()
    {
        return $this->belongsTo(Design::class);
    }

    // public function design_name($lang = null)
    // {
    //     $lang = $lang ?? App::getLocale();
    //     return json_decode($this->design_name)->$lang;
    // }

    // public function lang($lang = null)
    // {
    //     $lang = $lang ?? App::getLocale();
    //     return json_decode($this->lang)->$lang;
    // }

    // public function color($lang = null)
    // {
    //     $lang = $lang ?? App::getLocale();
    //    return json_decode($this->color)->$lang;
    // }


    // public function font($lang = null)
    // {
    //     $lang = $lang ?? App::getLocale();
    //    return json_decode($this->font)->$lang;
    // }
    // public function details($lang = null)
    // {
    //    $lang = $lang ?? App::getLocale();
    //     return json_decode($this->details)->$lang;
    // }
}
