<?php

namespace App\Http\Controllers\Api\Collections;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Http\Request;



class CatController extends Controller
{
    public function index()
    {
        $cats = CatResource::collection(Cat::active()->get());

        if ($cats->isEmpty()) {
            return callback_data(401, 'no_data');
        }

        return callback_data(200, 'categories', $cats);
    }

    public function show(Request $request)
    {
        $cat = Cat::active()->with('designs')->find($request->id);

        if (! $cat) {
            return callback_data(401, 'no_data');
        }

        return callback_data(200, 'category', new CatResource($cat));
    }
}
