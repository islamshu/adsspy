<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Exports\PostImport;
use App\Imports\PostImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
  


class UploadController extends Controller
{
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new PostImport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        try {
            Excel::import(new PostImport,request()->file('file'));
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            Log::alert($e->failures());
            }
// Excel::import(new PostImport,request()->file('file'));
           
        return back();
}
}
