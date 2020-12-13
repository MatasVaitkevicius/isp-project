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
                        <th scope="col">Review</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$product[0]->name }}</td>
                        <td>{{$product[0]->price}}</td>
                        <td>{{$product[0]->category }}</td>
                        <td>


                            <form style="display: inline;" method="get" action="{{ route('viewWriteReview', $product[0]->id ) }}">

                                <button type="submit" class="btn btn-danger">Write a Review </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection