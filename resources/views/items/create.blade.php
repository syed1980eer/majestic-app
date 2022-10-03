@extends('layouts.main')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Creating New Item</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('New Item Details') }}
                        <a href="{{ route('items.index') }}" class="float-right btn  btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-3">
                                    <label for="product_id">{{ __('Product Name') }}</label>
                                    <select name="product_id" class="form-control select2" @error('product_id') is-invalid @enderror" name="product_id" value="{{ old('product_id') }}" required autocomplete="product_id" aria-label="Default select example">                                        <option selected>Select Product to link Item</option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-3">
                                    <label for="item_name">{{ __('Item Name') }}</label>
                                    <input id="item_name" type="text" class="form-control @error('item_name') is-invalid @enderror" name="item_name" value="{{ old('item_name') }}" required autocomplete="item_name">
                                    @error('item_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-3">
                                    <label for="item_no">{{ __('Item No.') }}</label>
                                    <input id="item_no" type="text" class="form-control @error('item_no') is-invalid @enderror" name="item_no" value="{{ old('item_no') }}" required autocomplete="item_no">
                                    @error('item_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-3">
                                    <label for="item_unq_id">{{ __('Item UID') }}</label>
                                    {{-- <input id="item_unq_id" type="text" class="form-control @error('item_unq_id') is-invalid @enderror" name="item_unq_id" value="{{ old('item_unq_id') }}" required autocomplete="item_unq_id"> --}}
                                    <textarea style="resize: none; height: 38px; overflow:hidden; border:none; background-color: #f8f8f8;" readonly rows="1" name="item_unq_id" id="item_unq_id" class="form-control @error('item_unq_id') is-invalid @enderror" name="item_unq_id" value="{{ old('item_unq_id') }}">
                                    </textarea>
                                    @error('item_unq_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="item_unit_measure">{{ __('Units of Measure') }}</label>
                                    <select id="item_unit_measure" class="form-control select2" @error('item_unit_measure') is-invalid @enderror" name="item_unit_measure" value="{{ old('item_unit_measure') }}" required autocomplete="item_unit_measure" aria-label="Default select example">
                                        <option selected>Select Units of Measure for this Item</option>
                                        <option value="kilograms / kgs">kgs</option>
                                        <option value="liters">ltrs</option>
                                        <option value="meters">mtrs</option>
                                        <option value="gallons">gallons</option>
                                        <option value="pieces / pcs">pcs</option>
                                        <option value="dozens">dozens</option>
                                        <option value="boxes">boxes</option>
                                        <option value="packs">pks</option>
                                        <option value="bags">bags</option>
                                        <option value="barrels">brls</option>
                                        <option value="tons">tons</option>
                                        <option value="quintals">qntls</option>
                                    </select>
                                    @error('item_unit_measure')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-8">
                                    <label for="item_description">{{ __('Item Description') }}</label>
                                    <textarea rows="1" id="item_description" type="text" class="form-control @error('item_description') is-invalid @enderror" name="item_description" value="{{ old('item_description') }}" autocomplete="item_description"></textarea>
                                    @error('item_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-12">
                                    <label for="item_image">{{ __('Attach Image') }}</label>
                                    <input style="height: 45px" id="item_image" type="file" class="form-control @error('item_image') is-invalid @enderror" name="item_image" value="{{ old('item_image') }}" autocomplete="item_image">
                                    @error('item_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-lg-12" style="left: 40% !important">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save to Create Item') }}
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

