@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="row col align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Customers</h1>
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
                    <form action="{{ route('customers.index') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search by Customer">
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('customers.index')}}" class="btn btn-primary mb-2" style="margin-left: 4%; height:10%">Display All</a>
                    <a href="{{ route('customers.create')}}" class="btn btn-primary mb-2" style="margin-left: 4.5%; height:10%">Create Customer</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Customer UID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Contact Person</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($customers as $customer)
                      <tr>
                        <th scope="row">{{ $customer->customer_unq_id }}</th>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->contact_person_name }}</td>
                        <td>{{ $customer->contact_person_no }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-success">Edit</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection
