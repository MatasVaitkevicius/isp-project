@extends('layouts.apply-correct-layout')

@section('content')
<div class="container">

    <div class="card-body">
        <div class="container" style="margin:20px">
        <h4 style="font-weight: bold;">Product Name: {{$product->name}}</h4>
        <form method="get" action="{{ route('leaveReview', $product->id ) }}">
        Review:<br> <textarea type="text" id="review" name="review" value="" label=""> </textarea><br>
        <select name="rate" id="rate">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="5">4</option>
                <option value="5">5</option>
            </select>
            <button type="submit" class="btn btn-danger">Leave Review</button>
        </form>

        
        </div>
        @endsection