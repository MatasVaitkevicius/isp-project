<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Rating;
use Carbon\Carbon;
use GuzzleHttp\Client;
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

    public function viewAPI()
    {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
          'start' => '1',
          'limit' => '10',
          'convert' => 'EUR'
        ];

        $headers = [
          'Accepts: application/json',
          'X-CMC_PRO_API_KEY: cbd70184-ff75-4459-bbcf-d0f587f1dc7e'
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
          CURLOPT_URL => $request,            // set the request URL
          CURLOPT_HTTPHEADER => $headers,     // set the headers
          CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        $data = json_decode($response);
        $dataArray = $data->data;
        //dd($data->data); // print json decoded response
        //print_r($response);
        curl_close($curl); // Close request
        //print_r(json_decode($response));

        //return view('seller.viewAPI');
        return view('seller.viewAPI', compact('dataArray'));

    }

    //cbd70184-ff75-4459-bbcf-d0f587f1dc7e

    public function newProductPost(Request $request)
    {
      $this->validate(request(), [
          'stock_count' => 'numeric|min:1',
          'price' => 'numeric|min:0.01',
      ]);

        $product = new Product();
        $product->user_id = auth()->user()->id;
        $product->category = $request->get('category');
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->product_condition = $request->get('product_condition');
        $product->stock_count = $request->get('stock_count');
        $product->price = $request->get('price');
        $product->sold_count = 0;
        $product->is_bought = 0;
        $product->manufacture_date = $request->get('manufacture_date');
        $product->storage_location = $request->get('storage_location');
        $product->origin = $request->get('origin');
        $product->expiry_date = $request->get('expiry_date');
        $product->warranty = $request->get('warranty');
        $product->weight = $request->get('weight');
        $product->is_confirmed = 0;
        $product->created_at = Carbon::parse($product->created_at)->addHours(2);
        $product->save();
        //dd($product);

        return redirect()->route('viewSellersProductsList');
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
        return redirect()->route('viewSellersProductsList');
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
