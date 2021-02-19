<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
        return view('admin.categories')->with(['categories'=>$categories]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category')->with(['category'=>$category]);
    }

    public function showProducts($id)
    {
        $category = Category::findOrFail($id);
        $options = [];
        foreach ($category->subcategories as $subcat) {
            array_push($options, array("value" => $subcat->id, "text" =>  $subcat->name_ro ));
        }

        $filter=collect($options);
        session()->flash('filter_categories', $filter);

        return redirect()->route('products.index');
    }

}
