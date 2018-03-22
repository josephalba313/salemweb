@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Edit Tag - {{ $tag->name }}</div>

            <div class="card-body">

                <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Tag</label>
                        <input type="text" name="tag" value="{{$tag->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Update Tag</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
