<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $data['packages'] = Package::orderBy('id', 'DESC')->paginate(6);
        return view('Admin.packages.index')->with($data);
    }

    public function show(Package $package)
    {
        $data['package'] = $package;
        return view('Admin.packages.show')->with($data);

    }


    public function create()
    {
        return view('Admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'nameEn' => 'required|string|min:3|max:60',
            'nameAr' => 'required|string|min:3|max:60',
            'price' => 'required|numeric|min:1',
            'descEn' => 'required|string',
            'descAr' => 'required|string',

        ]);


        Package::create([
            'name' => json_encode([
                'en' => $request->nameEn,
                'ar' => $request->nameAr
            ]),
            'price' => $request->price,

            'desc' => json_encode([
                'en' => $request->descEn,
                'ar' => $request->descAr
            ]),
        ]);
        $request->session()->flash('msgAdd', 'Row Add Successfly');
        return redirect(url("/dashboard/packages"));

    }


    public function edit( Package $package)
    {
        $data['package'] = $package;
        return view('Admin.packages.edit')->with($data);

    }

    public function update( Request $request , Package $package)
    {
       $request->validate([
            'nameEn' => 'required|string|min:3|max:60',
            'nameAr' => 'required|string|min:3|max:60',
            'price' => 'required|numeric|min:1',
            'descEn' => 'required|string',
            'descAr' => 'required|string',
        ]);

        $package->update([
            'name' => json_encode([
                'en' => $request->nameEn,
                'ar' => $request->nameAr
            ]),
            'price' => $request->price,

            'desc' => json_encode([
                'en' => $request->descEn,
                'ar' => $request->descAr
            ]),
        ]);

        $request->session()->flash('msgUpdate', 'Row Updated Successfly');
        return redirect(url("/dashboard/packages"));

    }


    public function delete(Request $request,  Package $package)
    {
        $package->delete();
        $msg = "Row Deleted Successfly";
        $request->session()->flash('msgDeleted', $msg);
        return redirect(url("/dashboard/packages"));
    }






}
