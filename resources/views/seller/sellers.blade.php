@extends('layouts.apply-correct-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sellers List') }}</div>
                <div class="card-body">
                    {{ __('Here you can see sellers') }}
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
                        <th scope="col">User Role</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sellers as $seller)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$seller->name }}</td>
                        <td>{{$seller->user_role}}</td>
                        <td>{{$seller->created_at }}</td>
                        <td>
                            <form style="display: inline;" method="post" action="{{ route('deleteSeller', $seller) }}" onclick="return confirm('Do you really want to delete seller?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection