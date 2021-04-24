<?php

namespace App\Http\Controllers\Web\Admin;

use Exception;
use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller
{
    public function index()
    {
        $data['cats'] = Cat::orderBy('id', 'DESC')->paginate(6);
        return view('Admin.cats.index')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nameEn' => 'required|string|max:50',
            'nameAr' => 'required|string|max:50',
            'img' => 'required|image|max:2048'
        ]);


        $path = Storage::putFile("cats" , $request->file('img'));

        Cat::create([
            'name' => json_encode([
                'en' => $request->nameEn,
                'ar' => $request->nameAr,
            ]),
            'img' => $path,
        ]);

        $request->session()->flash('msgAdd', 'Row Add Successfly');

        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:cats,id',
            'nameEn' => 'required|string|max:50',
            'nameAr' => 'required|string|max:50',
            'img' => 'nullable|image|max:2048',
        ]);
        $cat = Cat::findOrfail($request->id);
        $path = $cat->img;
        if ($request->hasFile('img')) {
            Storage::delete($path);
            $path = Storage::putFile("cats" , $request->file('img'));
        }

        Cat::findOrfail($request->id)->update([
            'name' => json_encode([
                'en' => $request->nameEn,
                'ar' => $request->nameAr,
            ]),
            'img' => $path,
        ]);
        $request->session()->flash('msgUpdate', 'Row Updated Successfly');

        return back();
    }


    public function delete(Request $request,  Cat $cat)
    {
        try {
            $path = $cat->img;
            $cat->delete();
            Storage::delete($path);
            $msg = "Row Deleted Successfly";
            $request->session()->flash('msgDeleted', $msg);

        } catch (Exception $e) {
            $msg =   "Can't Delete this Row";
            $request->session()->flash('msgNoDeleted', $msg);
        };

        return back();
    }


    public function toggle(Cat $cat)
    {
        $cat->update([
            'active' => ! $cat->active
        ]);

        return back();
    }

}
