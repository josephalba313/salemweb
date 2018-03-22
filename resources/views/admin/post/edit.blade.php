@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Update Post</div>

            <div class="card-body">

                <form action="{{ route('post.update', ['id' => $post->id ]) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value={{ $post->title}} class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="categeory_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ ($category->id == $post->category_id) ? 'SELECTED' : '' }}>{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Select tags</label>
                        @foreach($tags as $tag)
                            <div class="checkbox">
                                <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                    @foreach($post->tags as $t)
                                        @if($t->id == $tag->id)
                                            checked
                                            @endif
                                    @endforeach
                                    > {{$tag->tag}} </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="featured">Featured Image</label>
                        <input type="file" placeholder="{{ $post->featured }}" name="featured" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="summernote" cols="5" rows="5" class="form-control">{{ $post->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Update Post</button>
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
