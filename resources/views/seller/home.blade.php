@extends('layouts.seller')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __('Hello seller!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection