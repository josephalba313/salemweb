@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Create New Tag</div>

            <div class="card-body">

                <form action="{{ route('tag.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tag</label>
                        <input type="text" name="tag" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Store Tag</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
