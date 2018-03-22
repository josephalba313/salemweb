@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">
                    Category List
                    <a href="{{ route('category.create') }}" class="btn btn-xs btn-info">
                        <span class="glyphicon glyphicon-pencil">New</span>
                    </a>

            </div>

            </div>

            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <th>
                        Category Name
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>

                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                                <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-xs btn-info">
                                    <span class="glyphicon glyphicon-pencil">Edit</span>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('category.destroy', ['id' => $category->id]) }}" method="POST">
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