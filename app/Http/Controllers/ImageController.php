<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'id' => ['required', 'integer', Rule::exists('products')->where(function ($query) use ($request) {
                $query->where('id', $request->id);
            })],
            'file' => 'array|min:1',
            'file.*' => 'required|image|max:10000',
        ]);

        $product = Product::find($valid['id']);
        $dir_name = "public/img/products";
        error_log(print_r($request->all(),1));
        foreach ($valid['file'] as $file){
            error_log(print_r($file,1));
            $filename = $file->getClientOriginalName();
            if (Image::where('filename', $filename)->exists()) {
                $filename = str_replace('.' . File::extension($filename), '_' . time() .'_'.Str::random(3). '.' .  File::extension($filename), $filename);
            }
            $image = new Image();
            $image->filename = $filename;
            $image->product_id = $valid['id'];
            $image->sort = Image::max('sort') + 1;
            $image->save();
            $file->storeAs(
                $dir_name, $filename
            );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::findOrFail($id);

        return response()->json([
            'images' => $product->images
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $product_id= $image->product_id;

        $dir_name = "public/img/products/";
        Storage::delete($dir_name . $image->filename);

        $image->delete();
        $product = Product::find($product_id);
        return response()->json([
            'msg' => 'Image was deleted successfully!',
            'images' => $product->images
        ])->setStatusCode(Response::HTTP_OK);
    }
}
