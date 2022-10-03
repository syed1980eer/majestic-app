@extends('layouts.main')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Creating New Product</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('New Product Details') }}
                        <a href="{{ route('products.index') }}" class="float-right btn  btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.store') }}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-8">
                                    <label for="product_name">{{ __('Product Name') }}</label>
                                    <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>
                                    @error('product_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="product_unq_id">{{ __('Product UID') }}</label>
                                    {{-- <input id="product_unq_id" type="text" class="form-control @error('product_unq_id') is-invalid @enderror" name="product_unq_id" value="{{ old('product_unq_id') }}" required autocomplete="product_unq_id" autofocus> --}}
                                    <textarea style="resize: none; height: 38px; overflow:hidden; border:none; background-color: #f8f8f8;" readonly rows="1" name="product_unq_id" id="product_unq_id" class="form-control @error('product_unq_id') is-invalid @enderror" name="product_unq_id" value="{{ old('product_unq_id') }}">
                                    </textarea>
                                    @error('product_unq_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-12">
                                    <label for="product_description">{{ __('Product Description') }}</label>
                                    <textarea id="product_description" type="text" class="form-control @error('product_description') is-invalid @enderror" name="product_description" value="{{ old('product_description') }}" required autocomplete="product_description" autofocus></textarea>
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
                                        {{ __('Save to Create Product') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

