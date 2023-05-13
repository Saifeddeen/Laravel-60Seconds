<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Imports\ClientsImport;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ClientsController extends Controller
{
    
    public function index(){
        $tableName = 'Clients';
        $clients = Client::all();

        return view('Dashboard.clients.index', compact('clients', 'tableName'));
    }

    public function create(){

        Gate::authorize('clients');

        return view('Dashboard.clients.add');
    }

    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string'],
            'rating' => ['min:0', 'max:5'],
        ]);

        $imagePath = null;

        if($request->hasFile('image')){
            $image = $request->file('image');
            if($image->isValid()){
                $imagePath = $image->store('images', 'public');
                $imagePath = '/storage/'.$imagePath;
            }
        }

        Client::create([
            'name' => ['en' => $request->post('name'), 'ar' => $request->post('name_ar')],
            'comment' => ['en' => $request->post('comment'), 'ar' => $request->post('comment_ar')],
            'rating' => $request->post('rating'),
            'image' => $imagePath,
        ]);

        return redirect()->route('clients.index');
    }

    public function edit($id){

        Gate::authorize('clients');

        $client = Client::findOrFail($id);

        return view('Dashboard.clients.update', compact('client'));
    }

    public function update(Request $request, $id){
        $client = Client::where('id', $id)->first();
        $request->validate([
            'name' => ['required', 'string'],
            'rating' => ['min:0', 'max:5'],
        ]);

        $imagePath = null;

        if($request->hasFile('image')){
            $image = $request->file('image');
            if($image->isValid()){
                $imagePath = $image->store('images', 'public');
                $imagePath = '/storage/'.$imagePath;
            }
        }
        $client->update([
            'name' => ['en' => $request->post('name'), 'ar' => $request->post('name_ar')],
            'comment' => ['en' => $request->post('comment'), 'ar' => $request->post('comment_ar')],
            'rating' => $request->post('rating'),
            'image' => $imagePath,
        ]);
        Log::info("the customer updated",[
            'name' => ['en' => $request->post('name'), 'ar' => $request->post('name_ar')],
            'comment' => ['en' => $request->post('comment'), 'ar' => $request->post('comment_ar')],
            'rating' => $request->post('rating'),
            'image' => $imagePath,
        ]);
        return redirect()->route('clients.index');
    }
    
    /*public function addClient(Request $request){

        $data = $request->except('image');
        $imagePath = null;

        if($request->hasFile('image')){
            $image = $request->file('image');
            if($image->isValid()){
                $imagePath = $image->store('images', 'public');
                $imagePath = '/storage/'.$imagePath;
            }
        }
        
        Client::create([
            'name' => ['en' => $request->post('name'), 'ar' => $request->post('name_ar')],
            'comment' => ['en' => $request->post('comment'), 'ar' => $request->post('comment')],
            'rating' => $request->post('rating'),
            'image' => $imagePath
        ]);
        return redirect()->route('admin');

    }*/

    public function destroy($id){

        Gate::authorize('clients');

        Client::find($id)->delete();

        return redirect()->route('clients.index');
    }

    public function destroySelected(Request $request){

        Gate::authorize('clients');
        
        $ids = $request->post('select_to_delete');
        if($ids == null){
            return redirect()->route('clients.index');
        }
        
        foreach($ids as $id){
            Client::find($id)->delete();
        }

        return redirect()->route('clients.index');

    }

    public function export(){
        return Excel::download(new ClientsExport, 'clients.xlsx');
    }

    public function import(Request $request){

        $request->validate([
            'excel_file' => ['required', 'file', 'mimes:xls,xlsx']
        ]);

        $file = null;

        if($request->hasFile('excel_file')){
            $file = $request->file('excel_file');
            if($file->isValid()){

                $arr = Excel::toArray(new ClientsImport, $file);
                
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

                $headings = ['name_en', 'name_ar', 'comment_en', 'comment_ar', 'rating', 'image'];
                $intersectSize = sizeof(array_intersect($headings, array_keys($arr[0][0])));
                
                if($intersectSize == sizeof($headings)){

                    Excel::import(new ClientsImport, $file);
                    return redirect()->back()->with('status', 'excel file imported successfully to database');
        
                }else{
                    return redirect()->back()->with('status', 'data of this file does not match');
                }

            }
        }

        
        return redirect()->back()->with('status','excel file not imported to database');
    }

}
