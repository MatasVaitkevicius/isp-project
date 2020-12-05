<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewProductsList()
    {
        $products = Product::orderBy('created_at')->where('is_confirmed', '1')->get();
        return view('product.products', compact('products'));
    }

    public function viewUnconfirmedProductsList()
    {
        $products = Product::orderBy('created_at')->where('is_confirmed', '0')->get();
        return view('product.unconfirmed-products', compact('products'));
    }
}
