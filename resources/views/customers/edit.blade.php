@extends('layouts.main')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editing Customer</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('Updating Customer') }}
                        <a href="{{ route('customers.index') }}" class="float-right btn  btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-8">
                                    <label for="customer_name">{{ __('Customer Name') }}</label>
                                    {{-- <input type="text" class="form-control" id="customer_name"> --}}
                                    <input id="customer_name" type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name', $customer->customer_name) }}" required>
                                    @error('customer_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="customer_unq_id">{{ __('Customer UID') }}</label>
                                    <input id="customer_unq_id" type="text" class="form-control @error('customer_unq_id') is-invalid @enderror" name="customer_unq_id" value="{{ old('customer_unq_id', $customer->customer_unq_id) }}" required>
                                    @error('customer_unq_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-8">
                                    <label for="contact_person_name">{{ __('Contact Person') }}</label>
                                    <input id="contact_person_name" type="text" class="form-control @error('contact_person_name') is-invalid @enderror" name="contact_person_name" value="{{ old('contact_person_name', $customer->contact_person_name) }}" required>
                                    @error('contact_person_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="contact_person_no">{{ __('Contact No.') }}</label>
                                    <input id="contact_person_no" type="text" class="form-control @error('contact_person_no') is-invalid @enderror" name="contact_person_no" value="{{ old('contact_person_no', $customer->contact_person_no) }}" required>
                                    @error('contact_person_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-lg-12" style="left: 40% !important">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Customer') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="m-2 p-2">
                    <form method="POST" action="{{ route('customers.destroy', $customer->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete this Customer - <b>{{ $customer->customer_name }}</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

