<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'currency' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:10'
        ]);

        Product::create([
            'title'=> $request->title,
            'content'=> $request->content,
            'stock'=> $request->stock,
            'promotion'=> $request->promotion,
            'price'=> $request->price,
            'currency'=> $request->currency,
            'warranty'=> $request->warranty,
            'images' => $request->images
        ]);     
        
        return redirect('/products')->with('successAlert', 'Successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'stock'=> 'required',
            'price'=> 'required',
            'currency'=> 'required',
        ]);

        Product::find($id)->update([
            'title'=> $request->title,
            'content'=> $request->content,
            'stock'=> $request->stock,
            'promotion'=> $request->promotion,
            'price'=> $request->price,
            'currency'=> $request->currency,
            'warranty'=> $request->warranty,
        ]);

        return redirect('/products')->with('successAlert', 'Successfully update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
        return redirect('/products')->with('successAlert', 'Successfully deleted');
    }
}
