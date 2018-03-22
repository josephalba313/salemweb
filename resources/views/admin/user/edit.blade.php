@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Update User</div>

            <div class="card-body">

                <form action="{{ route('user.update', ['id' => $user->id ]) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password"  class="form-control">
                    </div>

                    <div class="form-group">

                        <label for="admin">Role</label>
                        <select name="admin" id="admin" class="form-control">
                            <option value="0" {{ $user->admin == 0 ? "SELECTED" : "" }}>Subscriber</option>
                            <option value="1" {{ $user->admin == 1 ? "SELECTED" : "" }}>Admin</option>
                            <option value="2" {{ $user->admin == 2 ? "SELECTED" : "" }}>Member</option>
                            <option value="3" {{ $user->admin == 3 ? "SELECTED" : "" }}>Leader</option>
                            <option value="4" {{ $user->admin == 4 ? "SELECTED" : "" }}>Pastor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Update User</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
