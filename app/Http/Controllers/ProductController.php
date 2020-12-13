<?php

namespace App\Http\Controllers;

use App\Mail\ProductConfirmedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;

use PdfReport;

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
            'Sales Value' => function($result) {
                return ($result->price * $result->sold_count);
            }
        ];

        return PdfReport::of($title, $meta, $queryBuilder, $columns)
            ->showTotal([
                'Sales Value' => 'point'
            ])
            ->groupBy('Category')
            ->download('report');

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
