<?php

namespace App\Http\Controllers\Web\Admin;

use Exception;
use App\Models\Competition;
use Illuminate\Http\Request;
use App\Models\CompetitionDesign;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CompetitionController extends Controller
{
    public function index()
    {
        $data['competitions'] = Competition::orderBy('id', 'DESC')->paginate(6);
        return view('Admin.competitions.index')->with($data);
    }

    public function show(Competition $competition)
    {
        $data['competition'] = $competition;
        return view('Admin.competitions.show')->with($data);
    }


    public function create()
    {
        return view('Admin.competitions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nameEn' => 'required|string|min:3',
            'nameAr' => 'required|string|min:3',
            'descEn' => 'required|string',
            'descAr' => 'required|string',
            'started_at' => 'required',
            //'expired_at' => 'required|date_format:Y-M-D h:m:s'
            'expired_at' => 'required'
        ]);

        Competition::create([
            'name' => json_encode([
                'en' => $request->nameEn,
                'ar' => $request->nameAr,
            ]),
            'desc' => json_encode([
                'en' => $request->descEn,
                'ar' => $request->descAr,
            ]),

            'started_at' => $request->started_at,
            'expired_at' => $request->expired_at,
        ]);

        $request->session()->flash('msgAdd', 'Row Add Successfly');

        return redirect(url("/dashboard/competitions"));
    }


    public function edit(Request $request, Competition $competition)
    {
        $data['competition'] = $competition;
        return view('Admin.competitions.edit')->with($data);
    }

    public function update(Request $request, Competition $competition)
    {
        $data = $request->validate([
            'nameEn' => 'required|string|min:3',
            'nameAr' => 'required|string|min:3',
            'descEn' => 'required|string',
            'descAr' => 'required|string',
            'started_at' => 'required',
            //'expired_at' => 'required|date_format:Y-M-D h:m:s'
            'expired_at' => 'required'
        ]);

        $competition->update($data);

        $request->session()->flash('msgUpdate', 'Row Updated Successfly');

        return redirect(url("/dashboard/competitions"));
    }


    public function delete(Request $request, Competition $competition)
    {
        try {

            $competition->delete();
            $msg = "Row Deleted Successfly";
            $request->session()->flash('msgDeleted', $msg);
        } catch (Exception $e) {
            $msg =   "Can't Delete this Row";
            $request->session()->flash('msgNoDeleted', $msg);
        };

        return back();
    }

    public function toggle(Competition $competition)
    {
        $competition->update([
            'active' => !$competition->active
        ]);

        return back();
    }




    public function allDesigns(Competition $competition)
    {
        $data['competition'] = $competition;
        $data['competition_designs'] = CompetitionDesign::where('competition_id', $competition->id)
            ->orderBy('id', 'DESC')->paginate(6);
        return view('Admin.competitions.competition_designs.all-designs')->with($data);
    }

    public function showDesigns(Competition $competition, CompetitionDesign $competitionDesign)
    {
        $data['competition'] = $competition;
        $data['competitionDesign'] = $competitionDesign;
        return view('Admin.competitions.competition_designs.show-design')->with($data);
    }



    public function createDesign(Competition $competition)
    {
        $data['competition'] = $competition;
        return view('Admin.competitions.competition_designs.create')->with($data);
    }

    public function storeDesign(Request $request, Competition $competition)
    {
        $request->validate([
            'nameEn' => 'required|string',
            'nameAr' => 'required|string',
            'img' => 'required|image|max:2048',
            'descEn' => 'required|string',
            'descAr' => 'required|string',
        ]);

        $path = Storage::putFile("competitions" , $request->file('img'));


        CompetitionDesign::create([
            'competition_id' => $competition->id,
            'name' => json_encode([
                'en' => $request->nameEn,
                'ar' => $request->nameAr,
            ]),
            'img' => $path,
            'desc' => json_encode([
                'en' => $request->descEn,
                'ar' => $request->descAr,
            ]),
            'rate' => 0,
            'active' => 0
        ]);

        $request->session()->flash('msgAdd', 'Row Add Successfly');
        return redirect(url("/dashboard/competitions/designs/$competition->id"));
    }



    public function editDesign(Competition $competition, CompetitionDesign $competitionDesign)
    {
        $data['competition'] = $competition;
        $data['competitionDesign'] = $competitionDesign;
        return view('Admin.competitions.competition_designs.edit')->with($data);
    }

    public function updateDesign(Request $request, Competition $competition, CompetitionDesign $competitionDesign)
    {

        $request->validate([
            'nameEn' => 'required|string',
            'nameAr' => 'required|string',
            'img' => 'nullable|image|max:2048',
            'descEn' => 'required|string',
            'descAr' => 'required|string',
        ]);

        $path = $competitionDesign->img;
        if ($request->hasFile('img')) {
            Storage::delete($path);
            $path = Storage::putFile("competitions" , $request->file('img'));
        }


        $competitionDesign->update([
            'competition_id' => $competition->id,
            'name' => json_encode([
                'en' => $request->nameEn,
                'ar' => $request->nameAr,
            ]),
            'img' => $path,
            'desc' => json_encode([
                'en' => $request->descEn,
                'ar' => $request->descAr,
            ]),
        ]);

        $request->session()->flash('msgUpdate', 'Row Updated Successfly');
        return redirect(url("/dashboard/competitions/designs/$competition->id"));
    }


    public function deleteDesign(Request $request, CompetitionDesign $competitionDesign)
    {
        try {
            $path = $competitionDesign->img;
            $competitionDesign->delete();
            Storage::delete($path);
            $msg = "Row Deleted Successfly";
            $request->session()->flash('msgDeleted', $msg);

        } catch (Exception $e) {
            $msg =   "Can't Delete this Row";
            $request->session()->flash('msgNoDeleted', $msg);
        };

        return back();
    }

    public function toggleDesign(CompetitionDesign $competitionDesign)
    {
        $competitionDesign->update([
            'active' => ! $competitionDesign->active
        ]);

        return back();
    }









}
