@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="row col align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
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
                    <form action="{{ route('products.index') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input style="width: 81%;" type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search by Product">
                            </div>

                            <div class="col-auto">
                                <button style="margin-left: -55%;" type="submit" class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('products.index')}}" class="btn btn-primary mb-2" style="margin-left: -6.5%; height:10%">Display All</a>
                    <a href="{{ route('products.create')}}" class="btn btn-primary mb-2" style="margin-left: 1.3%; height:10%; width: 25%;">Create Product</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Product UID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                      <tr>
                        <td scope="row">{{ $product->product_unq_id }}</td>
                        <td scope="row">{{ $product->product_name }}</td>
                        <td scope="row">{{ $product->product_description }}</td>
                        <td scope="row">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Edit</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection
