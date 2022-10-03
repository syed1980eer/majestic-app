@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="row col align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Linked Products / Items</h1>
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
                <div class="row">
                    <form action="{{ route('linked.index') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search here">
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('linked.index')}}" class="btn btn-primary mb-2" style="position: absolute; right: 38%; height:39px">Display All</a>
                    <a href="{{ route('linked.create')}}" class="btn btn-primary mb-2" style="position: absolute; right: 35px;">Link New Item</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table linked_tbl">
                    <thead>
                      <tr style="font-size: 0.9rem">
                        <th>Customer Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Supplier Barcode</th>
                        <th scope="col">Supplier Ref. No.</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item No.</th>
                        <th scope="col">Item Description</th>
                        <th scope="col">Units of Measure</th>
                        <th scope="col">Item Image</th>
                        <th scope="col">Item Cost</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($linked as $lnkditem)
                      <tr style="font-size: 0.9rem">
                        <td>{{ $lnkditem->customer->customer_name }}</td>
                        <td>{{ $lnkditem->product->product_name }}</td>
                        <td>{{ $lnkditem->product->product_description }}</td>
                        <td>{{ $lnkditem->supplier_barcode }}</td>
                        <td>{{ $lnkditem->supplier_ref_no }}</td>
                        <td>{{ $lnkditem->item->item_name }}</td>
                        <td>{{ $lnkditem->item->item_no }}</td>
                        <td>{{ $lnkditem->item->item_description }}</td>
                        <td>{{ $lnkditem->item->item_unit_measure }}</td>
                        <td>
                            <img src="{{ asset('uploads/linkedItems/'.$lnkditem->item_image) }}"  width= '50' height='50' class="img img-responsive" />
                        </td>
                        <td>{{ $lnkditem->item_cost }}</td>
                        <td>
                            <a href="{{ route('linked.edit', $lnkditem->id) }}" class="btn btn-success">Edit</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection
