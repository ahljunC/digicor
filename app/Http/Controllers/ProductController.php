<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        return view('product.index', ['product' => $product]);
    }
    /**
     * Store a new product.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'categories' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        
        $product = new Product();

        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        // $product->categories = $request->input('categories');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        // $category = json_decode($request->input('categories'));

        // $product->categories()->attach($product->id, );

        $product->save();

        return redirect()->route('admin.showProducts');
    }
}
