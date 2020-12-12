<?php

namespace App\Http\Controllers;

use App\Mail\ProductConfirmedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

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

    public function confirmProduct($productId)
    {
        $product = Product::find($productId);
        $product['is_confirmed'] = true;
        $product['confirmation_date'] = Carbon::now()->addHours(2);
        $user = User::find($product['user_id']);
        $product->save();
        Mail::to($user['email'])->send(new ProductConfirmedMail());
        return redirect()->route('viewProductsList');
    }
}
