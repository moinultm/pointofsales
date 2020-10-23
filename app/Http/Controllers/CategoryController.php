<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $searchParams = ['name'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        $categories = Category::orderBy('name', 'asc');

        if($request->get('name')) {
            $categories->where(function($q) use($request) {
                $q->where('name', 'LIKE', '%' . $request->get('name') . '%');
            });
        }

        return view('categories.index')->withCategories($categories->paginate(20));
    }

    /**
     * post method of index.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postIndex(Request $request) {
        $params = array_filter($request->only($this->searchParams));
        return redirect()->action('CategoryController@getIndex', $params);
    }


    public function getNewCategory()
    {
        $category = new Category;
        $subcategory=  Category::pluck('name', 'id');
        return view('categories.form')->withCategory($category)
            ->withSubcategory($subcategory);
    }


    public function postCategory(CategoryRequest $request, Category $category)
    {
        $category->name = $request->get('name');
        $category->parent_id = $request->get('parent_id')|| 0;
        $category->save();

        $message = trans('core.changes_saved');
        return redirect()->route('category.form')->withSuccess($message);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEditCategory(Category $category)
    {
        return view('categories.form')->withCategory($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory(Category $category)
    {
        if(count($category->subcategories) ==  0 && count($category->product) == 0){
            $category->delete();
            $success = trans('core.deleted');
            return redirect()->back()->withSuccess($success);
        }else{
            $warning = trans('core.category_has_subcategories');
            return redirect()->back()->withWarning($warning);
        }
    }


    /**
     * Load Subcategory of a categories
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function ajaxRequest(Request $request)
    {
        $category_id = $request->get('categoryID');
        $subcategory = Subcategory::where('category_id', $category_id)->get();
        return view('categories.subcategory', compact('subcategory'));
    }

}
