@extends('layouts.main')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Orders</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-12">
                <div>
                    <div class="card-header">{{ __('Creating Order') }}
                        {{-- <a hreindex') }}" class="float-right btn  btn btn-primary">Back</a> --}}
                    </div>
                    <div>
                        <form method="GET" action="{{ route('orders.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row align-items-center">
                                <div class="form-group col-md-6 col-lg-5">
                                    <select id="customer_name" onchange="this.form.submit()" type="search" name="customer_id"
                                    class="form-control @error('customer_id') is-invalid @enderror" value="{{ old('customer_id') }}" required >
                                        <option selected></option>
                                        @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-auto">
                                    <input id="btn" type="button" class="btn btn-primary mb-3" value="Show Catalog" onclick="showDiv()">
                                </div>
                                <div class="float-right" style="margin-left: 91%; margin-top: -6.5%">
                                    <a href="{{ route('orders.create') }}" class="float-right btn  btn btn-primary">Back</a>
                                </div>
                            </div>
                            <div class="m-3">
                                Displaying Catalog for:
                                <strong>
                                    <span style="color: red" id="customerName1"></span>
                                    <span style="color: red">,
                                    <span style="color: grey; font-weight: normal">only</span>
                                        {{$count_linkeds}}
                                    </span>
                                </strong> items found in this Catalog.
                                <input type="text" hidden class="customerName_input" id="customerName_input" value="">
                                {{-- <input type="button" class="btn btn-primary" value="Display Barcode" onclick="display_barcode();"> --}}
                            </div>
                        </form>
                        <form id="orderForm" method="POST" action="{{ route('orders.store') }}" href="{{route('mht_order_pdf')}}" enctype="multipart/form-data">
                        {{-- <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data"> --}}
                            @csrf
                            <main id="catalog" style="display: none" class="main">
                                <div class="container">
                                    <div class="row s6 m3">
                                        <textarea type="text" hidden class="customerName_input" name="customerName_input" id="customerName_input2" value=""></textarea>
                                        @foreach($linkeds as $lnkditem)
                                        <div class="col s6 m3">
                                            <div class="card item-images">
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('uploads/linkedItems/'.$lnkditem->item_image) }}" width= '50' height='50'
                                                    class="img img-responsive" />
                                                </div>
                                                <div class="card-content mt-2 item">
                                                    <div>
                                                        <h6 style="font-size: 18px">
                                                            <strong><span style="color: red" hidden class="product_name" id="product_name">{{$lnkditem->product->product_name}}</span></strong>
                                                            <textarea style="color: red;" hidden type="text" class="product_name_input" id="product_name_input" name="product_name_input[]"
                                                            value="">{{$lnkditem->product->product_name}}</textarea>
                                                        </h6>
                                                    </div>
                                                    <div style="float: right; margin-top: -30px">
                                                        <label hidden style="float: right;" for="linked_id">{{ __(': Linked ID') }}</label>
                                                        <textarea hidden style="text-align: center; resize: none; width:100px; height: 28px; overflow:hidden; border:none;
                                                        background-color: #f8f8f8;" readonly rows="1" name="linked_id" id="linked_id" class="form-control"
                                                        value="{{ old('linked_id', $lnkditem->id) }}">{{ $lnkditem->id}}</textarea>
                                                    </div>
                                                    <p>
                                                        <strong hidden style="color: red"> {{ $lnkditem->product->product_description}}</strong>
                                                    </p>
                                                    <p>
                                                        <span id="item_name" hidden name="item_name" style="font-weight: bold; color: black" value="
                                                        {{ $lnkditem->item->item_name}}">{{ $lnkditem->item->item_name}}</span>
                                                        <textarea hidden type="text" id="item_name_input" name="item_name_input[]" value="">{{ $lnkditem->item->item_name}}</textarea>
                                                    </p>
                                                    <p>
                                                        <span readonly id="item_no" hidden name="item_no" style="font-weight: bold; color: black" value="
                                                        {{ $lnkditem->item->item_no}}">{{$lnkditem->item->item_no}}</span>
                                                        <textarea type="text" class="item_no_input" name="item_no_input[]" hidden id="item_no_input" value="">{{$lnkditem->item->item_no}}</textarea>
                                                    </p>
                                                    <p>
                                                        <strong id="item_description" hidden style="color: black">{{$lnkditem->item->item_description}}</strong>
                                                        <textarea type="text" id="item_description_input" class="item_description_input" name="item_description_input[]"
                                                        hidden value="">{{$lnkditem->item->item_description}}</textarea>
                                                    </p>
                                                    <p>
                                                        <strong id="supplier_ref_no" hidden style="color: black">{{$lnkditem->supplier_ref_no}}</strong>
                                                        <textarea type="text" class="supplier_ref_no_input" name="supplier_ref_no_input[]" hidden id="supplier_ref_no_input"
                                                        value="">{{$lnkditem->supplier_ref_no}}</textarea>
                                                    </p>
                                                    <p>
                                                        {{-- <strong id="supplier_barcode" hidden style="color: black">{{$lnkditem->supplier_barcode}}</strong>
                                                        <textarea type="text" class="supplier_barcode_input" name="supplier_barcode_input[]" hidden id="supplier_barcode_input"
                                                        value="">{{$lnkditem->supplier_barcode}}</textarea> --}}

                                                        <strong id="supplier_barcode" hidden style="color: black">{{$lnkditem->supplier_barcode}}</strong>
                                                        <textarea type="text" class="supplier_barcode_input" name="supplier_barcode_input[]" hidden
                                                        id="supplier_barcode_input-{{$lnkditem->supplier_barcode}}"
                                                        value="">{{$lnkditem->supplier_barcode}}</textarea>


                                                        {{-- <input id="supplier_barcode_input" type="text" class="form-control @error('supplier_barcode') is-invalid @enderror" name="supplier_barcode" value="{{$lnkditem->supplier_barcode}}" required autocomplete="supplier_barcode"> --}}
                                                    </p>
                                                    <p>Supplier Barcode:
                                                        <svg class="barcode"
                                                        id="ord_barcode-{{$lnkditem->supplier_barcode}}"></svg>
                                                    </p>
                                                    <div class="pass-quantity col-lg-3 col-md-4 col-sm-3 pl-0">
                                                        <label for="item_quantity" class="pass-quantity">Quantity:</label>
                                                        <input style="color: red" name="item_quantity[]" class="form-control" type="number" value="0" min="0">
                                                    </div>
                                                    <div>
                                                        <label for="pass-quantity" class="pass-quantity" style="color: red; font-weight: bold; float: right; margin-right: 14% !important;
                                                        margin-top: -32px">Item Price: AED - </label>
                                                        <p type="number" name="item_cost" class="item_cost" style="color: red; float: right; margin-top: -32px; margin-left: 5%;">
                                                            <strong id="item_cost">{{$lnkditem->item_cost}}</strong>
                                                            <textarea type="text" class="item_cost_input" name="item_cost_input[]" hidden id="item_cost_input" value="">
                                                            {{$lnkditem->item_cost}}</textarea>
                                                        </p>
                                                    </div>
                                                    <div class="product-price d-none">{{ $lnkditem->item_cost}}</div>
                                                    <hr class="sidebar-divider">
                                                    <strong style="color: red"><p>Total Amount: AED:</p></strong>
                                                    <div style="padding-top: 3.5%" class="product-line-price totalAmount_div pb-4 text-uppercase">
                                                        <strong><span id="itemTotal" style="color: red" type="number" name="itemTotal" class="product-line-price">0.00</span>
                                                        </strong>
                                                    </div>
                                                    <textarea type="text" class="itemTotal_input" hidden name="itemTotal_input[]" id="itemTotal_input" value=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card card-action mb-3 pt-4 order_summary">
                                    <div class="mb-3" style="margin-left: 2%">
                                        <label for="order_unq_id"></label>
                                        ORDER UID: <textarea name="order_unq_id" readonly rows="1"
                                        id="order_unq_id" class="form-control text-uppercase @error('order_unq_id') is-invalid @enderror" value="{{ old('order_unq_id') }}">
                                        </textarea>
                                    </div>
                                    <div style="margin-left: 3%">
                                        SAVING ORDER FOR: <strong> <span class="text-uppercase" style="color: red" id="order_save_customerName"></span></strong>
                                        <input type="text" class="customerName_order_save_input" hidden id="customerName_order_save_input" value="">
                                    </div><br>
                                    <div class="totals">
                                        <div class="border border-gainsboro mb-3 px-3">
                                            <div class="border-bottom border-gainsboro">
                                                <p class="text-uppercase mb-0 py-3 bg-primary text-white text-center"><strong>Order Summary</strong></p>
                                            </div>
                                            <p class="mt-3 text-uppercase">Subtotal AED:</p>
                                            <div class="totals-item subtotal_div d-flex align-items-center justify-content-between">
                                            {{-- style="float: right; margin-top: -40px"> --}}
                                                <p class="totals-value" name="subtotal" id="cart-subtotal"></p>
                                                <textarea type="text" class="subtotal_input" hidden id="subtotal_input" name="subtotal_input" value="0.00"></textarea>
                                            </div>
                                            <p class="text-uppercase">Aprox. VAT @5%</p>
                                            <div class="totals-item vat_div d-flex align-items-center justify-content-between">
                                                <p class="totals-value tax" id="cart-tax"></p>
                                                <textarea type="text" class="tax_input" hidden id="tax_input" name="tax_input" value="0.00">
                                                </textarea>
                                            </div>
                                            <div class="totals-item gTotal_div totals-item-total d-flex align-items-center justify-content-between
                                            border-top border-gainsboro">
                                                <p for="total" class="text-uppercase" style="color: red;"><strong>grand Total</strong></p>
                                                <textarea readonly rows="1" class="totals-value font-weight-bold cart-total" name="total" id="total">
                                                </textarea>
                                                <textarea type="text" class="total_input" hidden id="total_input" name="total_input"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button formtarget="_blank" onclick="revFunction()" type="submit" class="btn btn-primary" id="save_order">
                                    {{-- <button formtarget="_blank" value="click" onclick="mht_order_pdf(); revFunction();" type="submit" class="btn btn-primary" id="save_order"> --}}
                                        Save Order
                                    </button>
                                    <a id="excel_btn" class="disabled btn btn-primary" disabled href="{{route('export')}}">
                                        Export this to Excel
                                    </a>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </main>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
