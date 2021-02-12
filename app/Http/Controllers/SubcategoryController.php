<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use function GuzzleHttp\Promise\all;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   error_log(print_r($request->all(),1));
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
            'msg' => 'Subcategoria a fost creată cu succes!',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        //
    }
}
