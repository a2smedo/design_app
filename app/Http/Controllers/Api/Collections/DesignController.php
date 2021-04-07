<?php

namespace App\Http\Controllers\Api\Collections;

use App\Models\Rate;
use App\Models\Design;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DesignResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DesignController extends Controller
{
    public function index()
    {
        $designs  = DesignResource::collection(Design::orderBy('id', 'DESC')
        ->active()->get());

        if ($designs->isEmpty()) {
            return callback_data(401, 'no_data', []);
        }

        return callback_data(200, 'designs', $designs);
    }

    public function show(Request $request)
    {
        $design = Design::active()->with('designimgs')->find($request->id);

        if (!$design) {
            return callback_data(401, 'no_data');
        }

        return callback_data(200, 'design', new DesignResource($design));
    }


    public function addRate(Request $request, Design $design, Rate $rate)
    {
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'rate' => 'required|numeric|between:1,5',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            if (isset($errors['rate'])) {
                return callback_data(401, 'rate_required', []);
            }
        }

        $rates = Rate::where('user_id', $user->id)
            ->where('design_id', $design->id)
            ->get();
        $rates_arr = $rates->toArray();

        if (empty($rates_arr)) {
            $rate->create([
                'user_id' => $user->id,
                'design_id' => $design->id,
                'rate' => $request->rate
            ]);
        } else {
            $rate->where('user_id', $user->id)
                ->where('design_id', $design->id)
                ->update([
                    'rate' => $request->rate
                ]);
        }


        //update design rate
        $design_rates = DB::table('rates')->select(array('design_id', DB::raw('AVG(rate) as rate')))
            ->where('design_id', $design->id)->groupBy('design_id')->get();

        foreach ($design_rates as $dRate) {

            if ($design->id == $dRate->design_id) {
                $design->where('id', $dRate->design_id)
                    ->update(['rate' => $dRate->rate]);
            }
        }

        return callback_data(200, 'add_rate');
    }


    public function getOffers()
    {
        $designs = DesignResource::collection(Design::where('discount', '!=', 0)
            ->orderBy('id', 'DESC')
            ->active()
            ->get());


        //dd($designs);

        if ($designs->isEmpty()) {
            return callback_data(401, 'no_offers');
        }

        return callback_data(200, 'offers', $designs);
    }
}
