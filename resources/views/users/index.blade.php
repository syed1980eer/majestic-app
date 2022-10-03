@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="row col align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
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
                    <form action="{{ route('users.index') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input style="width:80%" type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search by User">
                            </div>

                            <div class="col-auto">
                                <button type="submit" style="margin-left: -50%; height:10%" class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('users.index')}}" class="btn btn-primary mb-2" style="margin-left: -4%; height:10%">Display All</a>
                    <a href="{{ route('users.create')}}" class="btn btn-primary mb-2" style="margin-left: 3%; height:10%">Create User</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        {{-- <th scope="col">Customer UID</th> --}}
                        <th scope="col">Employee Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                        <td>{{ $user->employee_name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection
