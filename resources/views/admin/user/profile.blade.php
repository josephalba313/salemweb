@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Edit User Profile</div>

            <div class="card-body">

                <form action="{{ route('profile.update') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                        <label>Role: <h6>{{['Subscriber', 'Admin', 'Member', 'Leader', 'Pastor'][$user->admin]}}</h6></label>

                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password"   class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Upload New Avatar</label>
                        <input type="file" name="avatar"   class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="about">About me</label>
                        <textarea name="about" id="" cols="6" rows="6" class="form-control">
                            {{ $user->profile->about }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" value="{{ $user->profile->firstname }}"   class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="middlename">Middle Name</label>
                        <input type="text" name="middlename"  value="{{ $user->profile->middlename }}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname"  value="{{ $user->profile->lastname }}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address1">Address Line 1</label>
                        <input type="text" name="address1" value="{{ $user->profile->address1 }}"   class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address2">Address Line 2</label>
                        <input type="text" name="address2" value="{{ $user->profile->address2 }}"   class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="text" name="telephone" value="{{ $user->profile->telephone }}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cellphone">Cellphone</label>
                        <input type="text" name="cellphone" value="{{ $user->profile->cellphone}}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" name="birthday" value="{{ $user->profile->birthday }}" class="form-control">
                    </div>

                        <div class="form-group">

                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="M"  {{ ($user->profile->gender = "M") ? "SELECTED" : "" }}>Male</option>
                                <option value="F" {{ ($user->profile->gender = "F") ? "SELECTED" : "" }}>Female</option>
                            </select>
                        </div>

                    <div class="form-group">
                        <label for="facebook">Facebook Profile</label>
                        <input type="text" name="facebook"   class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="youtube">Youtube Profile</label>
                        <input type="text" name="youtube"   class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Update Profile</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
