<?php

namespace App\Http\Controllers;

use App\Exports\FeaturesExport;
use App\Imports\FeaturesImport;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class FeaturesController extends Controller
{

    public function index()
    {

        $tableName = 'Features';
        $features = Feature::all();

        return view('Dashboard.features.index', compact('features', 'tableName'));
    }

    public function create()
    {

        Gate::authorize('features');
        return view('Dashboard.features.add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'content' => ['required'],
        ]);

        $iconPath = null;

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            if ($icon->isValid()) {
                $iconPath = $icon->store('icons', 'public');
                $iconPath = '/storage/' . $iconPath;
            }
        }

        Feature::create([
            'name' => ['en' => $request->post('name'), 'ar' => $request->post('name_ar')],
            'content' => ['en' => $request->post('content'), 'ar' => $request->post('content_ar')],
            'icon' => $iconPath,
        ]);

        return redirect()->route('features.index');
    }

    public function edit($id)
    {

        Gate::authorize('features');

        $feature = Feature::findOrFail($id);

        return view('Dashboard.features.update', compact('feature'));
    }

    public function update(Request $request, $id)
    {
        $feature = Feature::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string'],
            'content' => ['required'],
        ]);

        $iconPath = null;

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            if ($icon->isValid()) {
                $iconPath = $icon->store('icons', 'public');
                $iconPath = '/storage/' . $iconPath;
            }
        }

        $feature->update([
            'name' => ['en' => $request->post('name'), 'ar' => $request->post('name_ar')],
            'content' => ['en' => $request->post('content'), 'ar' => $request->post('content_ar')],
            'icon' => $iconPath,
        ]);

        return redirect()->route('features.index');
    }

    public function export()
    {
        return Excel::download(new FeaturesExport, 'features.xlsx');
    }

    public function import(Request $request)
    {

        $request->validate([
            'excel_file' => ['required', 'file', 'mimes:xls,xlsx']
        ]);

        $file = null;

        if ($request->hasFile('excel_file')) {
            $file = $request->file('excel_file');
            if ($file->isValid()) {

                $arr = Excel::toArray(new FeaturesImport, $file);

                foreach($arr[0] as $arr0){
                    $i = 0;
                    foreach($arr0 as $element){
                        if($element == null){
                            $i++;
                        }
                    }
                    if($i == sizeof($arr0)){
                        return redirect()->back()->with('status', 'error: row (' . array_search($arr0, $arr[0])+2 . ') equals null');
                    }
                    $i = 0;
                }

                $headings = ['name_en', 'name_ar', 'content_en', 'content_ar', 'icon'];
                $intersectSize = sizeof(array_intersect($headings, array_keys($arr[0][0])));

                if($intersectSize == sizeof($headings)){

                    Excel::import(new FeaturesImport, $file);
                    return redirect()->back()->with('status', 'excel file imported successfully to database');
        
                }else{
                    return redirect()->back()->with('status', 'data of this file does not match');
                }
                
            }
        }


        return redirect()->back()->with('status', 'excel file not imported to database');
    }

    /*public function addFeature(Request $request){

        $data = $request->except('icon');

        if($request->hasFile('icon')){
            $icon = $request->file('icon');
            if($icon->isValid()){
                $data['icon'] = $icon->store('icons', 'public');
                $data['icon'] = '/storage/'.$data['icon'];
            }
        }
        
        Feature::create($data);
        //dd($request->hasFile('icon'));
        return redirect()->route('admin');

    }*/

    public function destroy($id)
    {

        Gate::authorize('features');

        Feature::find($id)->delete();

        return redirect()->route('features.index');
    }

    public function destroySelected(Request $request)
    {

        Gate::authorize('features');

        $ids = $request->post('select_to_delete');
        if ($ids == null) {
            return redirect()->route('features.index');
        }

        foreach ($ids as $id) {
            Feature::find($id)->delete();
        }

        return redirect()->route('features.index');
    }
}
