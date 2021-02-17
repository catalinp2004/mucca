<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryWithSubcategoryResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products')->with(['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();

        return view('admin.products_create')->with(['categories_options' => collect(CategoryWithSubcategoryResource::collection($categories)), 'colors_options' => Color::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  error_log(print_r($request->all(),1));
        $valid = $request->validate([
            'product_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'colors' => 'required|array|min:1',
            'colors.*' => 'required|array|min:4',
            'colors.*.id' =>  'required|integer',
            'subcategories' => 'required|array|min:1',
            'subcategories.*' => 'required|array|min:2',
            'subcategories.*.value' =>  'required|integer',
        ]);
        $valid['sort'] = Product::max('sort') + 1;
        $product = new Product();
        $product->fill($valid);
        $product->save();
        foreach ($valid['colors'] as $color){
            $product->colors()->attach($color['id']);
        }
        foreach ($valid['subcategories'] as $subcategory){
            $product->subcategories()->attach($subcategory['value']);
        }
        session()->flash( 'msg', 'Product was created successfully');
        return response()->json([
            'msg' => 'The product was created successfully',
            'route' => route('products.index')
        ])->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
