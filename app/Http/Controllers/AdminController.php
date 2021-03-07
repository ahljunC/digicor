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
        return view('admin.edit-user', compact('user'));
    }

    // public function index(Product $product)
    // {
    //     return view('product.index', ['product' => $product]);
    // }
}
