@extends('layouts.apply-correct-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products report') }}</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="GET" action="{{ route('generateReport') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="fromdate" class="col-md-4 col-form-label text-md-right">{{ __('Include products created from') }}</label>
                            <div class="col-md-6">
                                <input id="fromdate" type="text" class="form-control @error('fromdate') is-invalid @enderror" name="fromdate" placeholder="ex. 2020-07-07" required autocomplete="fromdate" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="todate" class="col-md-4 col-form-label text-md-right">{{ __('To') }}</label>
                            <div class="col-md-6">
                                <input id="todate" type="text" class="form-control @error('todate') is-invalid @enderror" name="todate" placeholder="ex. 2020-07-09" required autocomplete="todate">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Generate a report') }}
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
        @endsection