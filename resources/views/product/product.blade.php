@extends('layouts.apply-correct-layout')

@section('content')
<div class="container">

    <div class="card-body">
        <div class="container" style="margin:20px">
        <p style="font-style:italic">Added to shop at: {{$product->created_at}}</p>
        <h4 style="font-weight: bold;">Product Name: {{$product->name}}</h4>
        <p>Description: {{$product->description}}</p>
        <p style="color:orange">Category: {{$product->category }}</p>
        <p style="color:green">Price: {{$product->price }}</p>
        <p>Condition: {{$product->product_condition }}</p>
        <p>Stock count: {{$product->stock_count }}</p>
        <p>Storage location: {{$product->storage_location}}</p>
        <p>Manufacture date: {{$product->manufacture_date}} | ORIGIN: {{$product->origin}}</p>
        <p>Weight: {{$product->weight}}</p>

        <form method="get" action="{{ route('buyProduct', $product->id) }}">
            <button type="submit" class="btn btn-danger">Buy</button>
        </form>

        
        </div>
        @endsection