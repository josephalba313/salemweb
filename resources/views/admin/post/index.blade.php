@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">
                    Post List
                    <a href="{{ route('post.create') }}" class="btn btn-xs btn-info">
                        <span class="glyphicon glyphicon-pencil">New</span>
                    </a>

            </div>

            </div>

            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <th>
                        Image
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>

                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px">
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                {{ $post->category->name }}
                            </td>
                            <td>
                                @if((Auth::user()->admin!=2) or (Auth::id()==$post->user_id))
                                  <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-xs btn-info">
                                      <span class="glyphicon glyphicon-pencil">Edit</span>
                                  </a>
                                @endif
                            </td>
                            <td>
                                @if((Auth::user()->admin!=2) or (Auth::id()==$post->user_id))
                                <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-xs btn-danger" type="submit">
                                            <span class="glyphicon glyphicon-trash">Delete</span>
                                        </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection