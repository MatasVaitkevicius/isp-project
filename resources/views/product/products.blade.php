@extends('layouts.apply-correct-layout')

@section('content')
<div class="container">

    <div class="card-body">
        <div class="container" style="margin:20px">
        
            
            
                
                
            <form method="get" action="{{route('viewFilteredProducts') }}">
            <select name="by" id="by">
                    <option value="name">Name</option>
                    <option value="price">Price</option>
                    <option value="category">Category</option>
                </select>
                <input type="text" id="value" name="value" value=""><br>
                <button type="submit" class="btn btn-danger">Filter</button>
            </form>

            <hr>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nr.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">View Product</th>
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


                            <form style="display: inline;" method="get" action="{{ route('viewSingleProduct', $product->id ) }}">

                                <button type="submit" class="btn btn-danger">View product</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection