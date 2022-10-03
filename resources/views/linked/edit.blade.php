@extends('layouts.main')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editing the Linked Item</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('Updating the Linked Item') }}
                        <a href="{{ route('linked.index') }}" class="float-right btn  btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('linked.update', $linked->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-3">
                                    <label for="product_id">{{ __('Product Name') }}</label>
                                    <select name="product_id" class="form-control select2" @error('product_id') is-invalid @enderror" name="product_id" value="{{ old('product_id', $linked->product_id) }}" required autocomplete="product_id" aria-label="Default select example"><option selected>Select Product to link Item</option>
                                    @foreach ($products as $product)
                                        {{-- <option value="{{ $product->id }}">{{ $product->product_name }}</option> --}}
                                        <option value="{{ $product->id }}" {{ $product->id == $linked->product_id ? 'selected' : '' }}>{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-3">
                                    <label for="item_id">{{ __('Item Name') }}</label>
                                    <select name="item_id" class="form-control select2" @error('item_id') is-invalid @enderror" name="item_id" value="{{ old('item_id', $linked->item_id) }}" required autocomplete="item_id" aria-label="Default select example"><option selected>Select Product to link Item</option>
                                        @foreach ($items as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $linked->item_id ? 'selected' : '' }}>{{ $item->item_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('item_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-3">
                                    <label for="item_id">{{ __('Item No.') }}</label>
                                    <select name="item_id" class="form-control select2" @error('item_id') is-invalid @enderror" name="item_id" value="{{ old('item_id', $linked->item_id) }}" required autocomplete="item_id" aria-label="Default select example"><option selected>Select Product to link Item</option>
                                        @foreach ($items as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $linked->item_id ? 'selected' : '' }}>{{ $item->item_no }}</option>
                                    @endforeach
                                    </select>
                                    @error('item_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-3">
                                    <label for="linked_unq_id">{{ __('Link UID') }}</label>
                                    <input id="linked_unq_id" type="text" class="form-control @error('linked_unq_id') is-invalid @enderror" name="linked_unq_id" value="{{ old('linked_unq_id', $linked->linked_unq_id) }}" required autocomplete="linked_unq_id">
                                    @error('linked_unq_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-5">
                                    <label for="customer_id">{{ __('Customer Name') }}</label>
                                    <select name="customer_id" class="form-control select2" @error('customer_id') is-invalid @enderror" name="customer_id" value="{{ old('customer_id') }}" required autocomplete="customer_id" aria-label="Default select example"><option selected>Select Customer to link Item</option>
                                        @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ $customer->id == $linked->customer_id ? 'selected' : '' }}>{{ $customer->customer_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="supplier_barcode">{{ __('Supplier Barcode') }}</label>
                                    <input  onfocusout="bc_generate()" id="supplier_barcode" type="text" class="form-control @error('supplier_barcode') is-invalid @enderror" name="supplier_barcode" value="{{ old('supplier_barcode', $linked->supplier_barcode) }}" required autocomplete="supplier_barcode">
                                    @error('supplier_barcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div style="height: 90px !important" class="form-group col-lg-3">
                                    <label for="supplier_barcode">{{ __('Generated Barcode') }}</label>
                                    <svg class="barcode" id="barcode"></svg>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-3">
                                    <label for="supplier_ref_no">{{ __('Supplier Ref. No') }}</label>
                                    <input id="supplier_ref_no" type="text" class="form-control @error('supplier_ref_no') is-invalid @enderror" name="supplier_ref_no" value="{{ old('supplier_ref_no', $linked->supplier_ref_no) }}" required autocomplete="supplier_ref_no">
                                    @error('supplier_ref_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 col-lg-5">
                                    <label for="item_image">{{ __('Attach Image') }}</label>
                                    <input id="item_image" type="file" class="form-control @error('item_image') is-invalid @enderror" name="item_image" value="{{ old('item_image') }}" autocomplete="item_image">
                                    @error('item_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <td>
                                    <img src="{{ asset('uploads/linkedItems/'.$linked->item_image) }}" style="margin-top: 2%; margin-right: 3.2%" width= '50' height='50' class="img img-responsive" />
                                </td>
                                <div class="form-group col-md-6 col-lg-3">
                                    <label for="item_cost">{{ __('Item Cost - AED') }}</label>
                                    <input id="item_cost" type="number" min="0.00" style="text-align: right; color:red" max="10000.00" step="0.01" class="form-control @error('item_cost') is-invalid @enderror" name="item_cost" value="{{ old('item_cost', $linked->item_cost) }}" required autocomplete="item_cost">
                                    @error('item_cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-lg-12" style="left: 40% !important">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save to Create Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="m-2 p-2">
                    <form method="POST" action="{{ route('linked.destroy', $linked->id) }}">
                        @csrf
                        @method('DELETE')
                        @foreach($itemNames as $lnkditem)
                        <button value="" class="btn btn-danger">Delete! Item - <b style="color: black">{{ $lnkditem->Item_Name }}</b> with Item No. = <b style="color: black"> {{ $lnkditem->Item_No }}</b> Linked to <b style="color: black">{{ $lnkditem->Customer_Name }}</b></button>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

