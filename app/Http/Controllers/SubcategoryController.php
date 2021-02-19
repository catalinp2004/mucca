<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use function GuzzleHttp\Promise\all;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'category_id' => ['required', 'integer', Rule::exists('categories','id')->where(function ($query) use ($request) {
                $query->where('id', $request->category_id);
            })],
            'name_ro' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'file' => 'required|image|max:10000',
        ]);

        $dir_name = "public/img";
        $filename = $valid['file']->getClientOriginalName();

        if (Subcategory::where('image', $filename)->exists()) {
            $filename = str_replace('.' . File::extension($filename), '_' . time() . '.' .  File::extension($filename), $filename);
        }

        $valid['image'] = $filename;

        $valid['file']->storeAs(
            $dir_name, $filename
        );

        $subcategory = new Subcategory();
        $subcategory->fill($valid);
        $subcategory->save();

        return response()->json([
            'msg' => 'Subcategory was created successful!',
            'category' => $subcategory->category
        ])->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        $filter = [];
        $filter[0] = ['text' => $subcategory->name_ro, 'value'=>$subcategory->id];
        $filter=collect($filter);
        session()->flash('filter_categories', $filter);

        return redirect()->route('products.index');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $valid = $request->validate([
            'name_ro' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'file' => 'sometimes|image|max:10000',
        ]);

        if (array_key_exists('file', $valid)) {
            $dir_name = "public/img";
            if (Storage::exists($dir_name . DIRECTORY_SEPARATOR . $subcategory->image)) {
                Storage::delete($dir_name . DIRECTORY_SEPARATOR . $subcategory->image);
            }
            $filename = $valid['file']->getClientOriginalName();
            if (Subcategory::where('image', $filename)->exists()) {
                $filename = str_replace('.' . File::extension($filename), '_' . time() . '.' .  File::extension($filename), $filename);
            }

            $valid['image'] = $filename;

            $valid['file']->storeAs(
                $dir_name, $filename
            );
        }

        $subcategory->update($valid);

        return response()->json([
            'msg' => 'Subcategory was updated successful!',
            'category' => $subcategory->category
        ])->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $dir_name = "public/img";
        if (Storage::exists($dir_name . DIRECTORY_SEPARATOR . $subcategory->image)) {
            Storage::delete($dir_name . DIRECTORY_SEPARATOR . $subcategory->image);
        }
        $category_id = $subcategory->category_id;
        $subcategory->delete();
        return response()->json([
            'msg' => 'Subcategory was deleted successful!',
            'category' => Category::find($category_id)
        ])->setStatusCode(Response::HTTP_OK);
    }
}
