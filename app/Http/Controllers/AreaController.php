<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    public function  index(){

        $areas=  ['0'=>'Primary']+ Area::lists('name','id')->all();
        return view('area.create',compact('areas'));
    }

    public function  create(){

        $areas=  ['0'=>'Primary']+ Area::lists('name','id')->all();
        return view('area.create',compact('areas'));
    }

    public function  store(Request $request) {
        $NewArea= new Area();
        $NewArea->name=$request->input("name");
        $NewArea->parent_id=$request->input("area_check");
        $NewArea->save();
        //dd($request->input("area_check"));
        return redirect('area.create');
    }



    public function  edit($id) {
        $areas=['0'=>'Primary']+ Area::lists('name','id')->all();

        $NewsArea=  Area::FindOrFail($id);
        //$categories=  Category::all();
        return view('area.edit',compact('NewsArea','areas'));
    }


    public function  update($id,Request $request) {
        $areas=['0'=>'Primary']+ AreaName::lists('name','id')->all();
        $NewsArea=Area::FindOrFail($id);
        $NewsArea->name=$request->input("name");
        $NewsArea->parent_id=$request->input("area_check");
        $NewsArea->update();
        return view('area.create',compact('areas'));
    }

}
