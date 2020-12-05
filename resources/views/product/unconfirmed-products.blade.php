@extends('layouts.apply-correct-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Unconfirmed Products List') }}</div>
                <div class="card-body">
                    {{ __('Here you can see unconfirmed products') }}
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container" style="margin:20px">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nr.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Confirm Product</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$product->name }}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->category }}</td>
                        <td>
                            <button type="submit" class="btn btn-warning">Confirm Product</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection