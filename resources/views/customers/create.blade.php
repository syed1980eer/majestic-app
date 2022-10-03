@extends('layouts.main')
@section('content')
@push('head')
<!-- Scripts -->
<script src="{{ asset('js/getUIDs.js')}}"></script>
@endpush

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Creating New Customer</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('New Customer Details') }}
                        <a href="{{ route('customers.index') }}" class="float-right btn  btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" name="form" action="{{ route('customers.store') }}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-8">
                                    <label for="customer_name">{{ __('Customer Name') }}</label>
                                    {{-- <input type="text" class="form-control" id="customer_name"> --}}
                                    <input id="customer_name" type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name') }}" autocomplete="customer_name" autofocus>
                                    @error('customer_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="customer_unq_id">{{ __('Customer UID') }}</label>
                                    <div>
                                        {{-- <span>
                                            <input id="customer_unq_id" type="text" class="form-control @error('customer_unq_id') is-invalid @enderror" name="customer_unq_id" value="{{ old('customer_unq_id') }}" required autocomplete="customer_unq_id" autofocus>

                                        </span> --}}
                                        <textarea style="resize: none; height: 38px; overflow:hidden; border:none; background-color: #f8f8f8;" readonly rows="1" name="customer_unq_id" id="customer_unq_id" class="form-control @error('customer_unq_id') is-invalid @enderror" name="customer_unq_id" value="{{ old('customer_unq_id') }}">

                                        </textarea>
                                    </div>
                                    @error('customer_unq_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                    {{-- Project ID: <span name="projectID" id="projectID"></span> --}}
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-8">
                                    <label for="contact_person_name">{{ __('Contact Person') }}</label>
                                    <input id="contact_person_name" type="text" class="form-control @error('contact_person_name') is-invalid @enderror" name="contact_person_name" value="{{ old('contact_person_name') }}" required autocomplete="contact_person_name" autofocus>
                                    @error('contact_person_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <label for="contact_person_no">{{ __('Contact No.') }}</label>
                                    <input id="contact_person_no" type="text" class="form-control @error('contact_person_no') is-invalid @enderror" name="contact_person_no" value="{{ old('contact_person_no') }}" required autocomplete="contact_person_no" autofocus>
                                    @error('contact_person_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-row">
                                <label for="customer_code" class="col-md-4 col-form-label text-md-end">{{ __('Customer Name') }}</label>

                                <div class="form-group col-md-6">
                                    <input id="Customer_code" type="text" class="form-control @error('Customer_code') is-invalid @enderror" name="Customer_code" value="{{ old('Customer_code') }}" required autocomplete="Customer_code" autofocus>

                                    @error('Customer_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Customer UID') }}</label>

                                <div class="form-group col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="first_name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Contact Person') }}</label>

                                <div class="form-group col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="first_name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Contact No.') }}</label>

                                <div class="form-group col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="first_name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="row mb-0">
                                <div class="col-lg-12" style="left: 40% !important">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save to Create Customer') }}
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

