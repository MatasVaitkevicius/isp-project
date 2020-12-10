@extends('layouts.apply-correct-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('workers List') }}</div>
                <div class="card-body">
                    {{ __('Here you can see workers') }}
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container" style="margin:20px">
            <div class="mt-2">
                <form style="display: inline;" action="{{ route('createWorker') }}">
                    @csrf
                    <button button type="submit" class="btn btn-primary">Create new worker</button>
                </form>
            </div>
            <table class="table table-bordered mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nr.</th>
                        <th scope="col">Name</th>
                        <th scope="col">User Role</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workers as $worker)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$worker->name }}</td>
                        <td>{{$worker->user_role}}</td>
                        <td>{{$worker->created_at }}</td>
                        <td>
                            <form style="display: inline;" method="get" action="{{ route('viewWorkerInfo', $worker) }}">
                                @csrf
                                @method('get')
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form style="display: inline;" method="post" action="{{ route('deleteWorker', $worker) }}" onclick="return confirm('Do you really want to delete worker?')">
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