<?php

namespace App\Http\Controllers\Api\Collections;

use App\Models\Competition;
use Illuminate\Http\Request;
use App\Models\CompetitionDesign;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CompetitionResource;
use App\Http\Resources\CompetitionDesignsResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompetitionController extends Controller
{

    //competitions
    public function index()
    {
        $competitions = CompetitionResource::collection(Competition::get());

        if ($competitions->isEmpty()) {
            return callback_data(401, 'no_data');
        }

        return callback_data(200, 'competitions', $competitions);
    }

    public function show(Request $request)
    {
        $competition = Competition::with('competition_designs')->find($request->id);

        if (!$competition) {
            return callback_data(401, 'no_data');
        }

        return callback_data(200, '', new CompetitionResource($competition));
    }


    //competitions designs
    public function getAllCompetitionDesigns()
    {
        $competition_designs = CompetitionDesignsResource::collection(CompetitionDesign::get());
        if (!$competition_designs) {
            return callback_data(401, 'no_data');
        }
        return callback_data(200, 'designs', $competition_designs);
    }


    public function addRate(Request $request, CompetitionDesign $competitionDesign)
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

        if ($user) {

            $competition_designs_user = DB::table('competitiondesign_user')
            ->where('competitiondesign_id', $competitionDesign->id)
            ->where('user_id', $user->id)
            ->get()->toArray();

            if (empty($competition_designs_user)) {
                $competitionDesign->users()->attach($user->id, [
                    'rate' => $request->rate,
                ]);
            }else{
                $competitionDesign->users()->updateExistingPivot($user->id, [
                    'rate' => $request->rate,
                ]);
            }
        }

        //update competition_designs rate
        $competition_designs_rates = DB::table('competitiondesign_user')->select(array('competitiondesign_id', DB::raw('AVG(rate) as rate')))
            ->where('competitiondesign_id', $competitionDesign->id)->groupBy('competitiondesign_id')->get();

        foreach ($competition_designs_rates as $dRate) {

            if ($competitionDesign->id == $dRate->competitiondesign_id) {
                $competitionDesign->where('id', $dRate->competitiondesign_id)
                    ->update(['rate' => $dRate->rate]);
            }
        }

        return callback_data(200, 'add_rate');
    }
}
