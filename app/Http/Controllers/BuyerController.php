<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Rating;
class BuyerController extends Controller
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
        return view('buyer.home');
    }

    public function viewBuyersList()
    {
        $buyers = User::where('user_role', 'buyer')->orderBy('created_at')->get();
        return view('buyer.buyers', compact('buyers'));
    }

    public function deleteBuyer($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('viewBuyersList');
    }
    public function viewAllProducts()
    {
        $products = Product::orderBy('created_at')->where('is_confirmed', '1')->where('is_bought', '0')->get();
        return view('buyer.home', compact('products'));
    }
    public function viewPurchaseHistory()
    {
        $user_id = auth()->user()->id;
        $orders = Order::orderBy('purchase_date')->where('user_id', $user_id)->get();
        $products = array();
        foreach ($orders as $order) {
            
            $product = Product::orderBy('created_at')->where('id', $order->item_id)->get();
            
            array_push($products,$product);
        }

        

        return view('buyer.purchasehistory', compact('products'));
    }
    public function viewWriteReview($id)
    {
        $product = Product::find($id);

        return view('buyer.reviewproduct', compact('product'));
    }

    public function leaveReview($id)
    {
        $product = Product::find($id);
        $user_id = auth()->user()->id;
        $rating = new Rating();
        $array = request(['review','rate']);
        $rating->date =  date("Y/m/d");
        $rating->review =  $array['review'];
        $rating->rating = $array['rate'];
        $rating->item_id = $id;
        $rating->user_id = $user_id;
        $rating->created_at =  date("Y/m/d");
        $rating->updated_at =  date("Y/m/d");
        $rating->save();


        $user_id = auth()->user()->id;
        $orders = Order::orderBy('purchase_date')->where('user_id', $user_id)->get();
        $products = array();
        foreach ($orders as $order) {
            
            $product = Product::orderBy('created_at')->where('id', $order->item_id)->get();
            
            array_push($products,$product);
        }

        

        return view('buyer.purchasehistory', compact('products'));
    }
    public function viewRateProduct($id)
    {
        // $product = Product::find($id);

        return redirect()->route('b');
    }
}

