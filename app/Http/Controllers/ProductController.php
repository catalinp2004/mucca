<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryWithSubcategoryResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use SoapClient;

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
        $categories = Category::all();

        $products = $this->selected_options($products);
        $client = new SoapClient("https://www.adler.info/b2b.wsdl",
        array( "trace" => true,
        "stream_context" =>true,
        "exceptions"=>false,
        "login" => "muccaprod",
        "password" => "jqKUvT",
        ));
        $result=$client->products(array ('id_lang' => 'ro', 'lists' => 'yes', 'structure' => 'complex'));
        dd($result->commodity);
        $url =
            'https://share.adler.info/images/product/C36/C36_32_C_xl.jpg';

        $img = 'logo.jpg';

// Function to write image into file
        file_put_contents($img, file_get_contents($url));
        return view('admin.products')->with(['products' => $products, 'categories_options' => collect(CategoryWithSubcategoryResource::collection($categories))]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products_create')->with(['categories_options' => collect(CategoryWithSubcategoryResource::collection($categories)), 'colors_options' => Color::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'product_code' => 'required|unique:products|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'colors' => 'nullable|array|min:0',
            'colors.*' => 'required|array|min:4',
            'colors.*.id' => 'required|integer',
            'subcategories' => 'required|array|min:1',
            'subcategories.*' => 'required|array|min:2',
            'subcategories.*.value' => 'required|integer',
        ]);
        $valid['slug'] = Str::slug(($valid['name'] . ' ' . $valid['product_code']), '_');
        $valid['sort'] = Product::max('sort') + 1;
        $product = new Product();
        $product->fill($valid);
        $product->save();
        foreach ($valid['colors'] as $color) {
            $product->colors()->attach($color['id']);
        }
        foreach ($valid['subcategories'] as $subcategory) {
            $product->subcategories()->attach($subcategory['value']);
        }
        session()->flash('msg', 'Product was created successfully');
        return response()->json([
            'msg' => 'The product was created successfully',
            'route' => route('products.edit', $product->id)
        ])->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        $options = [];

        foreach ($product->subcategories as $subcat) {
            array_push($options, array("value" => $subcat->id, "text" =>  $subcat->name_ro ));
        }

        $product['subcategories_options'] = $options;

        return view('admin.products_edit')->with(['categories_options' => collect(CategoryWithSubcategoryResource::collection($categories)), 'colors_options' => Color::all(), 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $valid = $request->validate([
            'product_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'colors' => 'nullable|array',
            'colors.*' => 'required|array|min:4',
            'colors.*.id' => 'required|integer',
            'subcategories' => 'required|array|min:1',
            'subcategories.*' => 'required|array|min:2',
            'subcategories.*.value' => 'required|integer',
        ]);

        $product->update($valid);
        $product->colors()->detach();
        $product->subcategories()->detach();

        foreach ($valid['colors'] as $color) {
            $product->colors()->attach($color['id']);
        }

        foreach ($valid['subcategories'] as $subcategory) {
            $product->subcategories()->attach($subcategory['value']);
        }

        session()->flash('msg', 'Product was updated successfully');

        return response()->json([
            'msg' => 'The product was updated successfully',
            'route' => route('products.index')
        ])->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $dir_name = "public/img/products/";

        foreach ($product->images as $image){
            Storage::delete($dir_name . $image->filename);
        }

        $product->delete();

        session()->flash('msg', 'The product was deleted succesfully.');

        return response()->json([
            'msg' => 'Product was deleted successfully',
            'route' => route('products.index')
        ])->setStatusCode(Response::HTTP_OK);
    }

    public function randomize() {
        $products =Product::all();
        $max = $products->count();
        $numbers = range(0, $max - 1);
        shuffle($numbers);

        foreach ($products as $key => $product){
            $product->sort = $numbers[$key];
            $product->save();
        }

        $products = Product::all();
        $products = $this->selected_options($products);

        return response()->json([
            'msg' => 'Products were randomized successfully',
            'products' => $products
        ])->setStatusCode(Response::HTTP_OK);

    }

    protected function selected_options($products){
        foreach ($products as $product){
            $options = [];
            foreach ($product->subcategories as $subcat) {
                array_push($options, array("value" => $subcat->id, "text" =>  $subcat->name_ro ));
            }
            $product['subcategories_options'] = $options;
        }

        return $products;
    }
}
