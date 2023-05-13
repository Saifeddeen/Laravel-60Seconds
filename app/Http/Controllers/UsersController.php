<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    
    public function index(){
        $users = User::all();
        $tableName = 'Users';
        $globalid = null;
        return view('Dashboard.users.index', compact('users', 'tableName', 'globalid'));
    }

    public function create(){

        Gate::authorize('users');

        return view('Dashboard.users.add');
    }

    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        User::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
        ]);

        return redirect()->route('users.index');
    }

    public function edit($id){

        Gate::authorize('users');

        $user = User::findOrFail($id);

        return view('Dashboard.users.update', compact('user'));
    }

    public function update(Request $request, $id){

        $user = User::where('id', $id)->first();
        
        if((Auth::user()->admin_type == 'super') && ($request->post('admin_type') != null)){
            $user->update([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'password' => Hash::make($request->post('password')),
                'admin_type' => $request->post('admin_type')
            ]); 
        }elseif((Auth::user()->admin_type == 'super') && ($request->post('admin_type') == null)){
            $user->update([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'password' => Hash::make($request->post('password')),
                'admin_type' => null
            ]);
        }else{
            $user->update([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'password' => Hash::make($request->post('password'))
            ]);
        }
        
        return redirect()->route('users.edit', $user->id);
    }

    public function updateProfile(Request $request, $id)
    {

        if ($request->post('password') == null) {
            if($request->post('email') != Auth::user()->email){
                $request->validate([
                    'email' => ['email', 'unique:users'],
                ]);
            }

            $user = User::where('id', $id)->first();
            $user->update([
                'name' => $request->post('name'),
                'email' => $request->post('email')
            ]);
        } else {
            if($request->post('email') != Auth::user()->email){
                $request->validate([
                    'email' => ['email', 'unique:users'],
                ]);
            }
            $request->validate([
                'password' => ['confirmed']
            ]);
            $user = User::where('id', $id)->first();
            $user->update([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'password' => Hash::make($request->post('password'))
            ]);
        }
        
        return redirect()->route('admin.dashboard', $user->id);
    }

    public function destroy($id){

        Gate::authorize('users');

        User::find($id)->delete();

        return redirect()->route('users.index');
    }

    public function destroySelected(Request $request){

        Gate::authorize('users');

        $ids = $request->post('select_to_delete');
        if($ids == null){
            return redirect()->route('users.index');
        }

        foreach($ids as $id){
            User::find($id)->delete();
        }

        return redirect()->route('users.index');

    }

    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import(Request $request){

        $request->validate([
            'excel_file' => ['required', 'file', 'mimes:xls,xlsx']
        ]);

        $file = null;

        if($request->hasFile('excel_file')){
            $file = $request->file('excel_file');
            if($file->isValid()){

                $arr = Excel::toArray(new UsersImport, $file);
                
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

                $headings = ['name', 'email', 'password', 'admin_type'];
                $intersectSize = sizeof(array_intersect($headings, array_keys($arr[0][0])));
                
                if($intersectSize == sizeof($headings)){

                    Excel::import(new UsersImport, $file);
                    return redirect()->back()->with('status', 'excel file imported successfully to database');
        
                }else{
                    return redirect()->back()->with('status', 'data of this file does not match');
                }

            }
        }

        
        return redirect()->back()->with('status','excel file not imported to database');
    }

}

