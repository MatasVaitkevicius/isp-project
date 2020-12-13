<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class SellerController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('seller.home');
    }

    public function viewSellersList()
    {
        $sellers = User::where('user_role', 'seller')->orderBy('created_at')->get();
        return view('seller.sellers', compact('sellers'));
    }

    public function deleteSeller($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('viewSellersList');
    }
    public function viewAllProducts()
    {
        $products = Product::orderBy('created_at')->where('is_confirmed', '1')->get();
        return view('seller.home', compact('products'));
    }
    public function viewPurchaseHistory()
    {
        $products = Product::orderBy('created_at')->where('is_confirmed', '1')->get();
        return view('buyer.purchasehistory', compact('products'));
    }
    public function viewWriteReview($id)
    {
        $product = Product::find($id);

        return view('buyer.reviewproduct', compact('product'));
    }
    public function viewRateProduct($id)
    {
        // $product = Product::find($id);

        return redirect()->route('sellerHome');
    }
}
