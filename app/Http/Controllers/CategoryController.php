<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function  getIndex(){
        $categories= ['0'=>'Primary']+ Category::lists('name','id')->all();

        return view('category.index',compact('categories'));
    }

    public function  create(){
        $categories= ['0'=>'Primary']+ Category::lists('name','id')->all();

        return view('category.create',compact('categories'));
    }

    public function  store(Request $request) {
        $NewCategory= new Category();
        $NewCategory->name=$request->input("name");
        $NewCategory->parent_id=$request->input("category_check");
        $NewCategory->save();
        //dd($request->input("category_check"));
        return redirect('category.create');
    }

    public function  edit($id) {
        $categories= ['0'=>'Primary']+ Category::lists('name','id')->all();

        $NewsCategory=  Category::FindOrFail($id);
        //$categories=  Category::all();
        return view('category.edit',compact('NewsCategory','categories'));
    }


    public function  update($id,Request $request) {
        $categories=  Category::lists('name','id');
        $NewCategory=Category::FindOrFail($id);
        $NewCategory->name=$request->input("name");
        $NewCategory->parent_id=$request->input("category_check");
        $NewCategory->update();
        return view('category.create',compact('categories'));
    }

}
