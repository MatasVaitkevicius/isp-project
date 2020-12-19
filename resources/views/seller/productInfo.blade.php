@extends('layouts.apply-correct-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit a Product') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateProduct', $product) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                              <select class="form-control" id="category" name="category">
                                  <option value="Electronics">Electronics</option>
                                  <option value="Clothes">Clothes</option>
                                  <option value="Furniture">Furniture</option>
                                  <option value="Cosmetics">Cosmetics</option>
                                  <option value="Toys">Toys</option>
                              </select>

                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text-area" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $product->description }}" required autocomplete="description"></textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="product_condition" class="col-md-4 col-form-label text-md-right">{{ __('Condition') }}</label>

                            <div class="col-md-6">
                                <textarea id="product_condition" type="text" class="form-control @error('product_condition') is-invalid @enderror" name="product_condition" value="{{ $product->product_condition }}" required autocomplete="product_condition" autofocus></textarea>

                                @error('product_condition')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock_count" class="col-md-4 col-form-label text-md-right">{{ __('Number in stock') }}</label>

                            <div class="col-md-6">
                                <input id="stock_count" type="number" class="form-control @error('stock_count') is-invalid @enderror" name="stock_count" value="{{ $product->stock_count }}" required autocomplete="stock_count" autofocus>

                                @error('stock_count')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" placeholder="ex. 19.99" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="price" autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="storage_location" class="col-md-4 col-form-label text-md-right">{{ __('Storage location') }}</label>

                            <div class="col-md-6">

                                <input id="storage_location" type="text" class="form-control @error('storage_location') is-invalid @enderror" name="storage_location" value="{{ $product->storage_location }}" required autocomplete="storage_location" autofocus>
                                @error('storage_location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="origin" class="col-md-4 col-form-label text-md-right">{{ __('Country of origin') }}</label>

                            <div class="col-md-6">
                                <input id="origin" type="text" class="form-control @error('origin') is-invalid @enderror" name="origin" value="{{ $product->origin }}" required autocomplete="origin" autofocus>

                                @error('origin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="manufacture_date" class="col-md-4 col-form-label text-md-right">{{ __('Manufacture date') }}</label>

                            <div class="col-md-6">
                                <input id="manufacture_date" type="date" class="form-control @error('manufacture_date') is-invalid @enderror" name="manufacture_date" value="{{ $product->manufacture_date }}" required autocomplete="manufacture_date" autofocus>

                                @error('manufacture_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="expiry_date" class="col-md-4 col-form-label text-md-right">{{ __('Expiry date') }}</label>

                            <div class="col-md-6">
                                <input id="expiry_date" type="date" class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date" value="{{ $product->expiry_date }}" autofocus>

                                @error('expiry_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="warranty" class="col-md-4 col-form-label text-md-right">{{ __('Warranty') }}</label>

                            <div class="col-md-6">
                                <input id="warranty" type="text" class="form-control @error('warranty') is-invalid @enderror" name="warranty" value="{{ $product->warranty }}" required autocomplete="warranty" autofocus>

                                @error('warranty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight (kg)') }}</label>

                            <div class="col-md-6">
                                <input id="weight" placeholder="ex. 2.75" type="number" step="0.01" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ $product->weight }}" required autocomplete="weight" autofocus>

                                @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Do you really want to confirm changes?')">
                                    {{ __('Update profile') }}
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
