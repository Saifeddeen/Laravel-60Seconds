<?php

namespace App\Http\Controllers;

use App\Exports\AuditsExport;
use App\Imports\AuditsImport;
use App\Models\Audit;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AuditController extends Controller
{
    
    public function getLogs(){
        $audits = Audit::all();
        
        $logs = [];
        $i = 0;
        foreach($audits as $audit){
            $user = User::where('id', $audit->user_id)->first();
            $auditableTypeWords = explode('\\', $audit->auditable_type);
            $auditableTypeName = $auditableTypeWords[sizeof($auditableTypeWords)-1];
            
            $logs[$i]['user'] = $user->name;
            $logs[$i]['event'] = $audit->event;
            $logs[$i]['auditable'] = $auditableTypeName;
            $logs[$i]['old_values'] = explode('","',$audit->old_values);
            $logs[$i]['new_values'] = explode('","',$audit->new_values);
            $logs[$i]['created_at'] = $audit->created_at;

            $i++;
        }

        return view('Dashboard.log', compact('logs'));
    }

    public function export(){
        return Excel::download(new AuditsExport, 'audits.xlsx');
    }

    public function import(Request $request){

        $request->validate([
            'excel_file' => ['required', 'file', 'mimes:xls,xlsx']
        ]);

        $file = null;

        if($request->hasFile('excel_file')){
            $file = $request->file('excel_file');
            if($file->isValid()){
                Excel::import(new AuditsImport, $file);
                return redirect()->back()->with('status','excel file imported successfully to database');
            }
        }

        return redirect()->back()->with('status','excel file not imported to database');

    }

}
