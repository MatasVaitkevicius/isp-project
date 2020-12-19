<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use DB;

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
    public function newProduct()
    {
        return view('seller.newProduct');
    }

    public function newProductPost()
    {
        $array = request(['category','name','description','product_condition','stock_count','price','storage_location','origin','manufacture_date','expiry_date','warranty','weight']);
        Product::create([
            'category' => $array['category'],
            'name' => $array['name'],
            'description' => $array['description'],
            'product_condition' => $array['product_condition'],
            'stock_count' => $array['stock_count'],
            'price' => $array['price'],
            'sold_count' => 0,
            'storage_location' => $array['storage_location'],
            'origin' => $array['origin'],
            'manufacture_date' => $array['manufacture_date'],
            'expiry_date' => $array['expiry_date'],
            'warranty' => $array['warranty'],
            'weight' => $array['weight'],
            'is_confirmed' => 0,
            'created_at' => NOW(),
            'updated_at' => '',
        ]);
        return redirect()->route('newProduct');
    }

    public function viewSellersProductsList()
    {
      $products = Product::orderBy('created_at')->get();
      return view('seller.deleteProduct', compact('products'));
    }

    public function viewSellersProductInfo($id)
    {
        $product = Product::find($id);
        return view('seller.productInfo', compact('product'));
    }

    public function updateProduct($id)
    {
        $product = request(['category','name','description','product_condition','stock_count','price','storage_location','origin','manufacture_date','expiry_date','warranty','weight']);
        DB::table('products')->where('id', $id)->update($product);
        return redirect()->route('viewSellersProductsList');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('viewProductsList');
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
