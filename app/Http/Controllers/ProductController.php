<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
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
        $products = Product::orderBy('created_at')->where('is_confirmed', '1')->where('is_bought', '0')->get();
        return view('product.products', compact('products'));
    }

    public function viewUnconfirmedProductsList()
    {
        $products = Product::orderBy('created_at')->where('is_confirmed', '0')->where('is_bought', '0')->get();
        return view('product.unconfirmed-products', compact('products'));
    }

    public function viewSingleProduct($id)
    {
        $product = Product::find($id);
        return view('product.product', compact('product'));
    }

    public function viewFilteredProducts()
    {
        $array = request(['by','value']);

        $products = Product::orderBy('created_at')->where($array['by'], $array['value'])->where('is_confirmed', '1')->get();
        return view('product.products', compact('products'));
    }
    
    public function buyProduct($item_id)
    {
        $user_id = auth()->user()->id;
        $product = Product::find($item_id);
        // $user = User::find($user_id);
        $order = new Order();

        $order->user_id =  $user_id;
        $order->item_id =  $item_id;
        $order->purchase_date =  date("Y/m/d");
        $order->items_price = $product->price;
        $order->delivery_price = 5;
        $order->earliest_expected_delivery = date("Y/m/d");
        $order->latest_expected_delivery = date("Y/m/d");
        $order->delivered_on = date("Y/m/d");
        $order->order_status = 1;
        $order->save();

        $product->is_bought = 1;
        $product->update();
        return redirect()->route('viewProductsList');
    }
}
