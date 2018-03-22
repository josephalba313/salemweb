@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">
                    Tag List
                    <a href="{{ route('tag.create') }}" class="btn btn-xs btn-info">
                        <span class="glyphicon glyphicon-pencil">New</span>
                    </a>

            </div>

            </div>

            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <th>
                        Tag
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>

                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{ $tag->tag }}
                            </td>
                            <td>
                                <a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-xs btn-info">
                                    <span class="glyphicon glyphicon-pencil">Edit</span>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('tag.destroy', ['id' => $tag->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-xs btn-danger" type="submit">
                                            <span class="glyphicon glyphicon-trash">Delete</span>
                                        </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection