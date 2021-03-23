<?php

namespace App\Http\Controllers\Api\Package;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function getPackages()
    {
        $packages = PackageResource::collection(Package::get());

        return callback_data(200, 'success', $packages);
    }


    public function choosePackage(Request $request, Package $package)
    {
        $user = $request->user();
        $pivotRow = $user->packages;
        if ($pivotRow->isEmpty()) {
            $user->packages()->attach($package->id, [
                'name' => $package->name,
            ]);
            return callback_data(200, 'add_success');
        }else{
            DB::table('package_user')->
            where('user_id', $user->id)->
            update([
                'package_id' => $package->id,
                'name' => $package->name,
            ]);

            return callback_data(200, 'update_success');
        }


    }
}
