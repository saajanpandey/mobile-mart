<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Products;
use Illuminate\Http\Request;
use File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::with('brand')->paginate(20);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('product.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // dd($request->all());
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['brand_id'] = $request->brand_id;
        $data['status'] = $request->status;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/productImages/');
            $image->move($destinationPath, $name);
        }
        $data['image'] = $name;
        $data['description'] = $request->description;
        Products::create($data);
        return redirect()->route('products.index')->with('success', 'The data was saved successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $Product
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $brands = Brand::all();
        return view('product.edit', compact('product', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        // dd($request->all());
        $product = Products::find($id);
        if ($request->hasFile('image')) {
            $path = public_path() . '/uploads/productImages/';

            //code for remove old file
            $image_path = public_path() . '/uploads/productImages/' . $product->image;
            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            //upload new file
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/productImages/');
            $image->move($destinationPath, $name);

            //for update in table
            $product->update(['image' => $name]);
        }
        $product->name = $request->name;
        $product->status = $request->status;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('products.index')->with('success', 'The data was updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $image_path = public_path() . '/uploads/productImages/' . $product->image;
        // dd($image_path);
        if (file_exists($image_path)) {
            File::delete($image_path);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'The data was deleted successfully');;
    }
}
