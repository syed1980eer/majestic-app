@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="row col align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Orders</h1>
    </div><br>

    <div class="row col mt-6">
        <div class="card mx-auto">
            <div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card-header">
                {{-- <div class="row"> --}}
                    {{-- <form action="{{ route('orders.index') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search here">
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </div>
                    </form> --}}
                    {{-- <a href="{{ route('orders.index')}}" class="btn btn-primary mb-2" style="position: absolute; right: 35%; height:39px">Display All</a> --}}
                {{-- </div> --}}
                <a href="{{ route('orders.create')}}" class="btn btn-primary mb-2" style=" float: right;">Create New Order</a>
            </div>

            <div class="card-body mx-auto p-0">
                <table class="table orders_tbl">
                    <thead>
                        <tr style="font-size: 0.8rem">
                        <th>Orders UID</th>
                        <th>Customer Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item No.</th>
                        <th scope="col">Item Descr.</th>
                        <th scope="col">Supplier Barcode</th>
                        <th scope="col">Supplier Ref. No.</th>
                        <th scope="col">Units of Measure</th>
                        <th scope="col">Item Qty.</th>
                        <th scope="col">Item Cost</th>
                        <th scope="col">Total</th>
                        {{-- <th scope="col">Manage</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      {{-- @foreach($linkeds as $lnkditem) --}}
                      @foreach($orderDtls as $order)
                      <tr style="font-size: 0.8rem">
                        <td>{{ $order->order_unq_id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->product_name_input }}</td>
                        <td>{{ $order->item_name_input }}</td>
                        <td>{{ $order->item_no_input }}</td>
                        <td>{{ $order->item_description_input }}</td>
                        <td>{{ $order->supplier_ref_no_input }}</td>
                        <td>{{ $order->supplier_barcode_input }}</td>
                        <td>{{ $order->item_unit_measure }}</td>
                        <td>{{ $order->item_quantity }}</td>
                        <td>{{ $order->item_cost_input }}</td>
                        <td><strong style="color: red"> {{ $order->total }}</strong></td>
                        {{-- <td>
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-success">Edit</a>
                        </td> --}}
                      </tr>
                      @endforeach
                      {{-- @endforeach --}}
                    </tbody>
                  </table>
                {!! $orders->links() !!}
            </div>
        </div>
    </div>

@endsection
