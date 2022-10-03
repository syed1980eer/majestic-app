@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="row col align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Items</h1>
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
                    <form action="{{ route('items.index') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search by Item">
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('items.index')}}" class="btn btn-primary mb-2" style="margin-left: 7.8%; height:10%">Display All Items</a>
                    <a href="{{ route('items.create')}}" class="btn btn-primary mb-2" style="margin-left: 7.8%; height:10%">Create New Item</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Item UID</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item No.</th>
                        <th scope="col">Units of Measure</th>
                        <th scope="col">Item Description</th>
                        <th scope="col">Item Images</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($items as $item)
                      <tr>
                        <td scope="row">{{ $item->product->product_name }}</td>
                        <td scope="row">{{ $item->item_unq_id }}</td>
                        <td scope="row">{{ $item->item_name }}</td>
                        <td scope="row">{{ $item->item_no }}</td>
                        <td scope="row">{{ $item->item_unit_measure }}</td>
                        <td scope="row">{{ $item->item_description }}</td>
                        <td scope="row">
                            <img src="{{ asset('uploads/items/'.$item->item_image) }}"  widtd= '50' height='50' class="img img-responsive" />
                        </td>
                        <td>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-success">Edit</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection
