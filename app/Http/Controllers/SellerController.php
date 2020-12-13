<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Rating;

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
}