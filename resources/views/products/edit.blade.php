@extends('layouts.main')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('Updating Product') }}
                        <a href="{{ route('products.index') }}" class="float-right btn  btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-8">
                                    <label for="product_name">{{ __('Product Name') }}</label>
                                    {{-- <input type="text" class="form-control" id="product_name"> --}}
                                    <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name', $product->product_name) }}" required>
                                    @error('product_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="product_unq_id">{{ __('Product UID') }}</label>
                                    <input id="product_unq_id" type="text" class="form-control @error('product_unq_id') is-invalid @enderror" name="product_unq_id" value="{{ old('product_unq_id', $product->product_unq_id) }}" required>
                                    @error('product_unq_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-8">
                                    <label for="product_description">{{ __('Product Description') }}</label>
                                    <textarea id="product_description" type="text" class="form-control @error('product_description') is-invalid @enderror" name="product_description" value="{{ old('product_description', $product->product_description) }}" required>{{$product->product_description}}</textarea>
                                    @error('product_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-lg-12" style="left: 40% !important">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Product') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="m-2 p-2">
                    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete this Product - <b>{{ $product->product_name }}</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

