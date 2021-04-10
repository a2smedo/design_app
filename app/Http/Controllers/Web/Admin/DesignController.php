<?php

namespace App\Http\Controllers\Web\Admin;

use Exception;
use App\Models\Cat;
use App\Models\Design;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Designimg;
use Illuminate\Support\Facades\Storage;

class DesignController extends Controller
{
    //DESIGNS

    //GET All Designs
    public function index()
    {
        $data['designs'] = Design::orderBy('id', 'DESC')->paginate(6);
        return view('admin.designs.index')->with($data);
    }

    //GET One Design
    public function show(Design $design)
    {
        $data['design'] = $design;
        return view('Admin.designs.show')->with($data);
    }


    //Create Design
    public function create()
    {
        $data['cats'] = Cat::select('id', 'name')->get();
        return view('Admin.designs.create')->with($data);
    }

    //Store Dedign
    public function store(Request $request)
    {
        $request->validate([
            'cat_id' => 'required|exists:cats,id',
            'type' => 'required',
            'nameEn' => 'required|string|min:3|max:60',
            'nameAr' => 'required|string|min:3|max:60',
            'main_img' => 'required|image|max:2048',
            'background' => 'required|image|max:2048',
            'descEn' => 'required|string',
            'descAr' => 'required|string',
            'price' => 'required|numeric|min:1',
            'discount' => 'required|numeric|min:1',
            'langEn' => 'required|string|min:3|max:60',
            'langAr' => 'required|string|min:3|max:60',
            'fontEn' => 'required|string|min:3|max:60',
            'fontAr' => 'required|string|min:3|max:60',
            'colorEn' => 'required|string|min:3|max:60',
            'colorAr' => 'required|string|min:3|max:60',
            'detailsEn' => 'required|string',
            'detailsAr' => 'required|string',
        ]);

        $main_img_path = Storage::putFile("designs", $request->file('main_img'));
        $background_path = Storage::putFile("designs", $request->file('background'));

        $design = Design::create([
            'cat_id' => $request->cat_id,
            'type' => $request->type,
            'name' => json_encode([
                'en' => $request->nameEn,
                'ar' => $request->nameAr,
            ]),
            'main_img' => $main_img_path,
            'background' => $background_path,
            'desc' => json_encode([
                'en' => $request->descEn,
                'ar' => $request->descAr,
            ]),
            'price' => $request->price,
            'discount' => $request->discount,
            'lang' => json_encode([
                'en' => $request->langEn,
                'ar' => $request->langAr,
            ]),
            'font' => json_encode([
                'en' => $request->fontEn,
                'ar' => $request->fontAr,
            ]),
            'color' => json_encode([
                'en' => $request->colorEn,
                'ar' => $request->colorAr,
            ]),
            'details' => json_encode([
                'en' => $request->detailsEn,
                'ar' => $request->detailsAr,
            ]),
            'rate' => 0,
            'active' => 0
        ]);

        $request->session()->flash('msgAdd', 'Row Add Successfly');

        return redirect(url("/dashboard/designs/sub-imgs-create/$design->id"));
    }


    //Edit Design
    public function edit(Design $design)
    {
        $data['design'] = $design;
        $data['cats'] = Cat::select('id', 'name')->get();
        return view('Admin.designs.edit')->with($data);
    }

    //Update Design
    public function update(Request $request, Design $design)
    {
        $request->validate([
            'cat_id' => 'required|exists:cats,id',
            'type' => 'required',
            'nameEn' => 'required|string|min:3|max:60',
            'nameAr' => 'required|string|min:3|max:60',
            'main_img' => 'nullable|image|max:2048',
            'background' => 'nullable|image|max:2048',
            'descEn' => 'required|string',
            'descAr' => 'required|string',
            'price' => 'required|numeric|min:1',
            'discount' => 'required|numeric|min:1',
            'langEn' => 'required|string|min:3|max:60',
            'langAr' => 'required|string|min:3|max:60',
            'fontEn' => 'required|string|min:3|max:60',
            'fontAr' => 'required|string|min:3|max:60',
            'colorEn' => 'required|string|min:3|max:60',
            'colorAr' => 'required|string|min:3|max:60',
            'detailsEn' => 'required|string',
            'detailsAr' => 'required|string',
        ]);

        $main_img_path = $design->main_img;
        $background_path = $design->background;

        if ($request->hasFile('main_img')) {
            Storage::delete($main_img_path);
            $main_img_path = Storage::putFile("designs", $request->file('main_img'));
        }
        if ($request->hasFile('background')) {
            Storage::delete($background_path);
            $background_path = Storage::putFile("designs", $request->file('background'));
        }

        $design->update([
            'cat_id' => $request->cat_id,
            'type' => $request->type,
            'name' => json_encode([
                'en' => $request->nameEn,
                'ar' => $request->nameAr,
            ]),
            'main_img' => $main_img_path,
            'background' => $background_path,
            'desc' => json_encode([
                'en' => $request->descEn,
                'ar' => $request->descAr,
            ]),
            'price' => $request->price,
            'discount' => $request->discount,
            'lang' => json_encode([
                'en' => $request->langEn,
                'ar' => $request->langAr,
            ]),
            'font' => json_encode([
                'en' => $request->fontEn,
                'ar' => $request->fontAr,
            ]),
            'color' => json_encode([
                'en' => $request->colorEn,
                'ar' => $request->colorAr,
            ]),
            'details' => json_encode([
                'en' => $request->detailsEn,
                'ar' => $request->detailsAr,
            ]),

        ]);

        $request->session()->flash('msgUpdate', 'Row Updated Successfly');
        return redirect(url('/dashboard/designs'));
    }


    //Delete design
    public function delete(Request $request, Design $design)
    {
        try {
            $main_img_path = $design->main_img;
            $background_path = $design->background;

            $design->delete();

            Storage::delete($main_img_path);
            Storage::delete($background_path);

            $msg = "Row Deleted Successfly";
            $request->session()->flash('msgDeleted', $msg);
        } catch (Exception $e) {
            $msg =   "Can't Delete this Row";
            $request->session()->flash('msgNoDeleted', $msg);
        }
        return back();
    }

    //Active
    public function toggle(Design $design)
    {
        $design->update([
            'active' => !$design->active
        ]);
        return back();
    }

    //Slider
    public function slider(Design $design)
    {
        if ($design->slider == "unused") {
            $design->update([
                'slider' => 'used'
            ]);
        } else {

            $design->update([
                'slider' => 'unused'
            ]);
        }
        return back();
    }





    //sub-images
    public function showImgs(Design $design)
    {
        $data['design'] = $design;
        $data['design_images'] = Designimg::where('design_id', $design->id)->orderBy('id', 'DESC')->paginate(3);
        return view('Admin.designs.show-imgs')->with($data);
    }

    public function createSubImgs(Design $design)
    {
        $data['design'] = $design;
        return view('Admin.designs.create-imgs')->with($data);
    }

    public function storeSubImgs(Request $request, Design $design)
    {
        $request->validate([
            'imgs' => 'required|array',
            'imgs.*' => 'required|image|max:2048',
        ]);

        $path = "";
        $imgs = $request->file('imgs');

        if ($request->hasFile('imgs')) {
            foreach ($imgs as $img) {
                $path = Storage::putFile("designs/sub_imgs", $img);
            }
        }

        Designimg::create([
            'design_id' => $design->id,
            'img' => $path
        ]);
        $request->session()->flash('imgAdd', 'Image Added Successfly');
        return redirect(url("dashboard/designs/show/sub-images/$design->id"));
    }


    public function editSubImgs(Design $design, Designimg $designimg)
    {
        $data['design'] = $design;
        $data['designimg'] = $designimg;

        return view('Admin.designs.edit-imgs')->with($data);
    }

    public function updateSubImgs(Request $request, Design $design, Designimg $designimg)
    {
        $request->validate([
            'img' => 'nullable|image|max:2048'
        ]);

        $path = $designimg->img;

        if ($request->hasFile('img')) {
            Storage::delete($path);
            $path = Storage::putFile("designs/sub_imgs", $request->file('img'));
        }

        $designimg->update([
            'img' => $path
        ]);
        $request->session()->flash('imgUpdate', 'Image Updated Successfly');
        return redirect(url("/dashboard/designs/show/sub-images/{$design->id}"));
    }

    public function deleteSubImgs(Request $request, Design $design, Designimg $designimg)
    {
        try {
            $path = $designimg->img;
            $designimg->delete();
            Storage::delete($path);
            $msg = "Row Deleted Successfly";
            $request->session()->flash('msgDeleted', $msg);
        } catch (Exception $e) {
            $msg =   "Can't Delete this Row";
            $request->session()->flash('msgNoDeleted', $msg);
        }
        $request->session()->flash('imgdelete', 'Image Deleted Successfly');
        return redirect(url("/dashboard/designs/show/sub-images/{$design->id}"));
    }



      //Active
      public function toggleSubImgs(Design $design, Designimg $designimg)
      {
          $designimg->update([
              'active' => !$designimg->active
          ]);
          return back();
      }



}
