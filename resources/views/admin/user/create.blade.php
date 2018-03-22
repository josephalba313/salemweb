@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Create New User</div>

            <div class="card-body">

                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">

                        <label for="admin">Role</label>
                        <select name="admin" id="admin" class="form-control">
                            <option value="0">Subscriber</option>
                            <option value="1">Admin</option>
                            <option value="2">Member</option>
                            <option value="3">Leader</option>
                            <option value="4">Pastor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Add User</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
