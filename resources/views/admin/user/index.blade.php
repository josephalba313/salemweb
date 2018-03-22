@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">
                    User List
                    <a href="{{ route('user.create') }}" class="btn btn-xs btn-info">
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
                        Name
                    </th>
                    <th>
                        Permissions
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>

                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{ asset($user->profile->avatar) }}" alt="" width="60px" height="60px" style="border-radius: 50%;">
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{['Subscriber', 'Admin', 'Member', 'Leader', 'Pastor'][$user->admin]}}
                            </td>
                            <td>
                                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-xs btn-info">
                                    <span class="glyphicon glyphicon-pencil">Edit</span>
                                </a>
                            </td>
                            <td>
                                @if(\Auth::id() !== $user->id)
                                    <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="POST">
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