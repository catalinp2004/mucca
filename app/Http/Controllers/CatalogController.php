<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ColorResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CatalogController extends Controller
{
    public function getRandom()
    {
        $products = Product::inRandomOrder()->take(12)->get();
        $nr_products = Product::all()->count();
        return response(['products'=>ProductResource::collection($products), 'nr_products' => $nr_products])->setStatusCode(Response::HTTP_OK);
    }
    public function getCategories()
    {
        return response(['categories'=>CategoryResource::collection(Category::all())])->setStatusCode(Response::HTTP_OK);
    }
    public function getColors()
    {
        return response(['colors'=>ColorResource::collection(Color::all())])->setStatusCode(Response::HTTP_OK);
    }
    public function getCountProducts()
    {
        return response(['count'=>Product::all()->count()])->setStatusCode(Response::HTTP_OK);
    }


    public function getProducts(Request $request)
    {
        $valid = $request->validate([
            'search' => 'nullable|string',
            'subcategory' => 'nullable|string',
            'colors' => 'nullable|array',
            'category' => 'nullable|string',
            'per_page' => 'required|integer|min:12|max:48',
            'current_page' => 'required|integer',
        ]);

        $products = Product::orderBy('sort');
        if ($valid['category'] != null && $valid['subcategory'] == null){
            $category = Category::where('name_ro', $valid['category'])->first();
            $subcategories = Subcategory::where('category_id', $category->id)->get()->pluck('id');
            $subcategories_products = DB::table('product_subcategory')
                ->join('subcategories', 'product_subcategory.subcategory_id', '=', 'subcategories.id')
                ->whereIn('subcategories.id', $subcategories)
                ->get()->pluck('product_id')->unique();
            $products = $products->whereIn('id', $subcategories_products);
        } else if ($valid['category'] != null && $valid['subcategory'] != null){
            $subcategories_products = DB::table('product_subcategory')
                ->join('subcategories', 'product_subcategory.subcategory_id', '=', 'subcategories.id')
                ->where('subcategories.name_ro', $valid['subcategory'])
                ->get()->pluck('product_id')->unique();
            $products = $products->whereIn('id', $subcategories_products);
        }
        if ($valid['colors'] != null){
            $colors_products = DB::table('color_product')
                ->join('colors', 'color_product.color_id', '=', 'colors.id')
                ->whereIn('colors.name', $valid['colors'])
                ->get()->pluck('product_id')->unique();
            $products = $products->whereIn('id', $colors_products);
        }
        if ($valid['search'] != null){
            $products = $products->whereRaw('UPPER(`product_code`) LIKE ?', ['%' . strtoupper($valid['search']) . '%'])->orWhereRaw('UPPER(`name`) LIKE ?', ['%' . strtoupper($valid['search']) . '%']);
        }
        $nr_products = $products->count();
        $products = $products->skip(($valid['per_page']*($valid['current_page']-1)))->take($valid['per_page'])->get();
        return response(['products'=>ProductResource::collection($products), 'nr_products' => $nr_products])->setStatusCode(Response::HTTP_OK);
    }

}
