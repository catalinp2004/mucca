<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ColorResource;
use App\Http\Resources\ImageResource;
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
    public function getProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $category_id = $product->subcategories->first()->category_id;

        $subcategories = DB::table('categories')
            ->join('subcategories', 'categories.id', '=', 'subcategories.category_id')
            ->where('categories.id', $category_id)
            ->get()->pluck('id')->unique();
        $subcategories_products = DB::table('product_subcategory')
            ->join('subcategories', 'product_subcategory.subcategory_id', '=', 'subcategories.id')
            ->whereIn('subcategories.id', $subcategories)
            ->get()->pluck('product_id')->unique();

        $products = Product::whereIn('id', $subcategories_products)->take(8)->get();
        return response(['product' => ProductResource::make($product),'colors' => ColorResource::collection($product->colors), 'images'=>ImageResource::collection($product->images), 'products'=>ProductResource::collection($products)])->setStatusCode(Response::HTTP_OK);
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

        $products = Product::query();
        $products->when($valid['category'] != null && $valid['subcategory'] == null, function ($q) use ($valid) {
            $subcategories = DB::table('categories')
                ->join('subcategories', 'categories.id', '=', 'subcategories.category_id')
                ->where('categories.name_ro', $valid['category'])
                ->get()->pluck('id')->unique();
            $subcategories_products = DB::table('product_subcategory')
                ->join('subcategories', 'product_subcategory.subcategory_id', '=', 'subcategories.id')
                ->whereIn('subcategories.id', $subcategories)
                ->get()->pluck('product_id')->unique();
            return $q->whereIn('id', $subcategories_products);
        });
        $products->when($valid['category'] != null && $valid['subcategory'] != null, function ($q) use ($valid) {
            $subcategories_products = DB::table('product_subcategory')
                ->join('subcategories', 'product_subcategory.subcategory_id', '=', 'subcategories.id')
                ->where('subcategories.name_ro', $valid['subcategory'])
                ->get()->pluck('product_id')->unique();
            return $q->whereIn('id', $subcategories_products);
        });
        $products->when($valid['colors'] != null, function ($q) use ($valid) {
            $colors_products = DB::table('color_product')
                ->join('colors', 'color_product.color_id', '=', 'colors.id')
                ->whereIn('colors.name', $valid['colors'])
                ->get()->pluck('product_id')->unique();
            return $q->whereIn('id', $colors_products);
        });
        $products->when($valid['search'] != null, function ($q) use ($valid) {
            return $q->where(function ($query) use ($valid){
                $query->whereRaw('UPPER(`product_code`) LIKE ?', ['%' . strtoupper($valid['search']) . '%'])
                    ->orWhereRaw('UPPER(`name`) LIKE ?', ['%' . strtoupper($valid['search']) . '%']);
            });
        });
        $nr_products = $products->count();
        $products = $products->orderBy('sort')->skip(($valid['per_page']*($valid['current_page']-1)))->take($valid['per_page'])->get();
        return response(['products'=>ProductResource::collection($products), 'nr_products' => $nr_products])->setStatusCode(Response::HTTP_OK);
    }

}
