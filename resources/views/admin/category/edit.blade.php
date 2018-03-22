@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Edit Category - {{ $category->name }}</div>

            <div class="card-body">

                <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" name="name" value="{{$category->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Update Category</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
