<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CatalogController extends Controller
{
    public function getCategories()
    {
        return response(['categories'=>CategoryResource::collection(Category::all())])->setStatusCode(Response::HTTP_OK);
    }
    public function getCountProducts()
    {
        return response(['count'=>Product::all()->count()])->setStatusCode(Response::HTTP_OK);
    }


    public function getProducts(Request $request)
    {
        $valid = $request->validate([
            'per_page' => 'required|integer|min:12|max:48',
            'search' => 'nullable|string',
            'category' => 'nullable|string',
            'current_page' => 'required|integer',
            'subcategory' => 'nullable|string',
            'colors' => 'nullable|array',
        ]);
        error_log(print_r($valid['per_page'],1));

        $products = Product::orderBy('sort')->skip(($valid['per_page']*($valid['current_page']-1)))->take($valid['per_page'])->get();
        $nr_products = Product::all()->count();
        return response(['products'=>ProductResource::collection($products), 'nr_products' => $nr_products])->setStatusCode(Response::HTTP_OK);
    }

}
