<?php

namespace App\Http\Controllers\Api\Collections;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatResource;
use App\Http\Resources\DesignResource;
use App\Models\Cat;
use App\Models\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
       $user = Auth::user();
       $cats = CatResource::collection(Cat::get());
       $designs = DesignResource::collection(Design::get());

       return callback_data(200 ,'' , [
        //    'user' => $user->id,
           'cats' => $cats,
           'designs' => $designs
       ]);


    }
}
