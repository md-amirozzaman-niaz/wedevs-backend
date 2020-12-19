<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return auth()->user()->products()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $url = null;
        if ($request->has('image') && is_file($request->image)) {
            $validated = $request->validate([
                    'image' => 'mimes:jpeg,png,PNG,JPG|max:1014',
                ]);

            $extension = $request->image->extension();
            $fileName = time().".".$extension;
            $request->image->storeAs('/public', $fileName);
            $url = Storage::url($fileName);
        }

        $data = $request->except('image');
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $url;
        return Product::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $url = null;
        $data = $request->except('image');
        if ($request->has('image') && is_file($request->image)) {
            $validated = $request->validate([
                    'image' => 'mimes:jpeg,png,PNG,JPG|max:1014',
                ]);

            $extension = $request->image->extension();
            $fileName = time().".".$extension;
            $request->image->storeAs('/public', $fileName);
            $url = Storage::url($fileName);
            $data['image'] = $url;
        }
        $data['user_id'] = auth()->user()->id;
        return $product->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return $product->delete();
    }
}
