@extends('layouts.apply-correct-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cryptocurrency list') }}</div>
                <div class="card-body">
                    {{ __('Here you can see cryptocurrencies and their current prices.') }}
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
                        <th scope="col">Price (EUR)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataArray as $seller)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$seller->name }}</td>
                        <td>{{$seller->quote->EUR->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection
