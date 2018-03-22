@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Edit Settings</div>

            <div class="card-body">

                <form action="{{ route('setting.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Site Name</label>
                        <input type="text" name="site_name" value="{{$setting->site_name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Address</label>
                        <input type="text" name="address" value="{{$setting->address}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Contact Phone</label>
                        <input type="text" name="contact_number" value="{{$setting->contact_number}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Contact Email</label>
                        <input type="email" name="contact_email" value="{{$setting->contact_email}}"  class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Update Site Settings</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
