@extends('layouts.main')
@section('content')
@push('head')
<!-- Scripts -->
<script src="{{ asset('js/getUIDs.js')}}"></script>
@endpush

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editing Users</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update User Details') }}
                        <a href="{{ route('users.index') }}" class="float-right btn  btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="employee_name" class="col-md-4 col-form-label text-md-end">{{ __('Employee Name') }}</label>

                                <div class="col-md-6">
                                    <input id="employee_name" type="employee_name" class="form-control @error('employee_name') is-invalid @enderror" name="employee_name" value="{{ old('employee_name', $user->employee_name) }}" required autocomplete="employee_name">

                                    @error('employee_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update User') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="m-2 p-2">
                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete this User - <b>{{ $user->employee_name }}</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

