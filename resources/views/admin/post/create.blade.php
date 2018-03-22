@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Create New Post</div>

            <div class="card-body">

                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Select tags</label>
                        @foreach($tags as $tag)
                            <div class="checkbox">
                                <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{$tag->tag}} </label>

                            </div>
                            @endforeach
                    </div>
                    <div class="form-group">
                        <label for="featured">Featured Image</label>
                        <input type="file" name="featured" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="summernote" cols="5" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Store Post</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('summernote/dist/summernote-bs4.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('summernote/dist/summernote-bs4.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
