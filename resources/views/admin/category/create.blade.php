@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Create New Category</div>

            <div class="card-body">

                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Store Category</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
