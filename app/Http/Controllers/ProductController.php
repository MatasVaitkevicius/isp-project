<?php

namespace App\Http\Controllers;

use App\Mail\ProductConfirmedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use PdfReport;
use App\Models\Order;
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
        return view('product.products', compact('products','array'));
    }
    
    public function viewFilteredProductsAfterTwoFilters()
    {
        $array2 = request(['by','value','by2','value2']);
        $products = Product::orderBy('created_at')->where($array2['by'], $array2['value'])->where($array2['by2'], $array2['value2'])->where('is_confirmed', '1')->get();
        return view('product.products', compact('products','array2'));
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

    public function productsReport()
    {
        return view('product.products-report');
    }
    public function generateReport(Request $request)
    {
        $request->validate([
            'todate' => 'date',
            'fromdate' => 'date'
        ]);
        $title = 'Sales by category';
        $meta = [
            'For products that have been created' => $request->fromdate . ' To ' . $request->todate
        ];

        $queryBuilder = Product::select(['category', 'name', 'price', 'sold_count'])
            ->whereBetween('created_at', [$request->fromdate, $request->todate])
            ->orderBy('category', 'ASC');
        $columns = [
            'Name' => 'name',
            'Category' => 'category',
            'Price' => 'price',
            'Units sold' => 'sold_count',
            'Sales Value' => function ($result) {
                return ($result->price * $result->sold_count);
            }
        ];

        return PdfReport::of($title, $meta, $queryBuilder, $columns)
            ->showTotal([
                'Sales Value' => 'point'
            ])
            ->groupBy('Category')
            ->download('report');
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
