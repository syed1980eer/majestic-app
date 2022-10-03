@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello, <br> Welcome to
                    <span style="color: #9f2a21; font-family: 'Audiowide'"> majestic house </span> Dashboard.
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        {{-- <span>Welcome to <strong>majestic house</strong> </span> --}}
                    {{-- {{ __('You are logged in') }} as, <strong style="color: red">{{ Auth::user()->employee_name}}.</strong> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
