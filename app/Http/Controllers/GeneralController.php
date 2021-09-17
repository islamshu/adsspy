<?php

namespace App\Http\Controllers;

use App\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index(){
        return view('dashboard.general.index')->with('general',General::first());
    }
    public function store(Request $request){
    $general = General::first();
        // $request->validate([
        //     'title'=>'required',
        //     'dec'=>'required',
        // ]);
        $request_all = $request->except(['icon','logo']);
        if($request->logo != null){
        $request_all['logo'] = $request->logo->store('general');
    }
    if($request->icon != null){

        $request_all['icon'] = $request->icon->store('general');
    }
    // dd($request_all);
    $general->update($request_all);
    return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
    }
    public function social(){
        return view('dashboard.general.social')->with('general',General::first());

    }
}
