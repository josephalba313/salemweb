@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Create New Baptismal</div>

            <div class="card-body">

                <form action="{{ route('baptismal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Baptismal Date</label>
                        <input type="date" name="baptismal_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="featured">Requirement: Birth Certificate (Scanned Image)</label>
                        <input type="file" name="requirement" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Store Baptismal</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
