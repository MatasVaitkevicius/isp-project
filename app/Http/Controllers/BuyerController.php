<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
