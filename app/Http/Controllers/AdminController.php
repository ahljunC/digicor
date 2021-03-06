<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    public function showProducts()
    {
        $products = Product::paginate(10);

        return view('admin.products', compact('products'));
    }

    public function addProduct()
    {
        $categories = Category::all();

        return view('admin.add-product', compact('categories'));
    }
    /**
     * Save a new product.
     *
     * @param  Request  $request
     * @return Response
     */
    public function saveProduct(Request $request)
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

        $product->save();

        // $product = Product::create([
        //     'name' => $data['name'],
        //     'slug' => $data['slug'],
        //     'description' => $data['description'],
        //     'price' => $data['price'],
        // ]);



        return view('admin.products');
    }

    public function showOrders()
    {
        $orders = Order::paginate(10);

        return view('admin.orders', compact('orders'));
    }

    public function showAccounts()
    {
        $users = User::paginate(10);

        return view('admin.accounts', compact('users'));
    }

    public function editUser(User $user)
    {
        dd($user);
        return view('admin.edit-user', compact('user'));
    }
}
