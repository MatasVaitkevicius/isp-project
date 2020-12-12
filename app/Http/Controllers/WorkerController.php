<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use PdfReport;
class WorkerController extends Controller
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
        return view('worker.home');
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
    }
}
