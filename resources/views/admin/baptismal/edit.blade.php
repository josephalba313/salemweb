@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Edit Baptismal - {{ $baptismal->name }}</div>

            <div class="card-body">

                <form action="{{ route('baptismal.update', ['id' => $baptismal->id]) }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$baptismal->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Baptismal Date</label>
                        <input type="date" name="baptismal_date"  value="{{$baptismal->baptismal_date}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="requirement">Requirement: Birth Certificate (Scanned Image)</label>
                        <input type="file" name="requirement" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Update Baptismal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
