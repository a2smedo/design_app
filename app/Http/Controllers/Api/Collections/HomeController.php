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
       $cats = CatResource::collection(Cat::active()->get());
       $design_sliders = DesignResource::collection(
           Design::where('slider', 'used')->orderBy('id', 'DESC')->active()->get()
        );
       $offers = DesignResource::collection(
           Design::where('discount', '!=', '0')->orderBy('id', 'DESC')->active()->get()
        );

       return callback_data(200 ,'home' , [
           'user' => $user,
           'cats' => $cats,
           'design_sliders' => $design_sliders,
           'offers' => $offers
       ]);
    }

    



}
