@extends('layouts.apply-correct-layout')

@section('content')
<div class="container">

    <div class="card-body">
        <div class="container" style="margin:20px">
        <h4 style="font-weight: bold;">Product Name: {{$product->name}}</h4>
        <form method="get" action="">
        Review:<br> <textarea type="text" id="count" name="count" value="" label=""> </textarea><br>
            <button type="submit" class="btn btn-danger">Leave Review</button>
        </form>

        
        </div>
        @endsection