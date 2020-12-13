@extends('layouts.apply-correct-layout')

@section('content')
<div class="container">

    <div class="card-body">
        <div class="container" style="margin:20px">
            <hr>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nr.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Rate</th>
                        <th scope="col">Review</th>
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

                        <form method="get" action="">
                            <select name="rate" id="rate">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="5">4</option>
                                <option value="5">5</option>
                            </select>
                            <button type="submit" class="btn btn-danger">Rate</button>
                        </form>

                        </td>
                        <td>


                            <form style="display: inline;" method="get" action="{{ route('viewWriteReview', $product->id ) }}">

                                <button type="submit" class="btn btn-danger">Write a Review </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection