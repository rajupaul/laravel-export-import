<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use PDF;
class UserController extends Controller
{
    public function list(){
        $users=User::get();
        return view('users',['users'=>$users]);
    }

    public function import_user(Request $request){
        $request->validate([
            'excel_file'=>'required|mimes:xlsx'
        ]);

        try {
            Excel::import(new UsersImport, $request->file('excel_file'));
            return redirect()->back()->with('success', 'Users successfully imported');

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             
             return redirect()->back()->with('import_errors', $failures);
             
             // foreach ($failures as $failure) {
             //     $failure->row(); // row that went wrong
             //     $failure->attribute(); // either heading key (if using heading row concern) or column index
             //     $failure->errors(); // Actual error messages from Laravel validator
             //     $failure->values(); // The values of the row that has failed.
             // }
        }
    }

    public function export_user(){
        $users=User::orderBy('id','desc')->get();
        return (new UsersExport($users))->download('users.csv', \Maatwebsite\Excel\Excel::CSV);
        //return Excel::download(new UsersExport, 'users-data.xlsx');
    }

    public function export_user_pdf(){
            $users=User::get();
            $pdf = PDF::loadView('pdf.users',[
                'users'=>$users
            ]);
            //return $pdf->stream();
            return $pdf->download('users.pdf');
    }
}
