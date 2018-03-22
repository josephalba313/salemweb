@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">


            <div class="card-header">
                <div class="row">
                    <div class="col-5">
                        <h4>
                            Funeral Service List
                        </h4>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('funeral.create') }}" class="btn btn-xs btn-primary">
                            <span class="glyphicon glyphicon-pencil">New</span>
                        </a>
                    </div>
                    <div class="col-5">
                        <a href="{{ route('funeral.approved') }}" class="btn btn-xs btn-info">
                            Approved
                        </a>

                        <a href="{{ route('funeral.pending') }}" class="btn btn-xs btn-info">
                            Pending
                        </a>

                        <a href="{{ route('funeral.all') }}" class="btn btn-xs btn-info">
                            All
                        </a>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">

                <table class="table table-hover">
                    <thead>
                    <th>
                        Approval
                    </th>

                    <th>
                        Death Certificate
                    </th>
                    <th>
                        Deceased Name
                    </th>
                    <th>
                        Funeral Date
                    </th>
                    <th>
                        Date Died
                    </th>
                    <th>
                        Birthday
                    </th>
                    <th>
                        Approved by
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Print
                    </th>
                    <th>
                        Delete
                    </th>

                    </thead>
                    <tbody>
                    @foreach($funerals as $funeral)
                        <tr>
                            @if(Auth::user()->admin == 4)
                                <td>
                                    @if( $funeral->approved == 0)
                                        <a href="{{ route('funeral.approve', ['id' => $funeral->id]) }}"
                                           class="btn btn-xs btn-success">
                                            <span class="glyphicon glyphicon-pencil">Approve</span>
                                        </a>
                                    @else
                                        Approved
                                    @endif
                                </td>
                            @else
                                <td>
                                    {{ $funeral->approved == 0 ? 'Pending' : 'Approved' }}
                                </td>
                            @endif

                            <td>
                                <img src="{{ $funeral->requirement }}" alt="Death Certificate is required" width="90px"
                                     height="50px">
                            </td>
                            <td>
                                {{ $funeral->name }}
                            </td>
                            <td>
                                {{ $funeral->funeral_date }}
                            </td>
                            <td>
                                {{ $funeral->death_date }}
                            </td>
                            <td>
                                {{ $funeral->birthday }}
                            </td>
                            <td>
                                @if($funeral->approved==1)
                                    {{ $funeral->approved_user->name }}
                                @endif
                            </td>
                            @if((Auth::user()->admin==1) or (Auth::user()->admin==4) or(Auth::id()==$funeral->user_id))

                                <td>
                                    <a href="{{ route('funeral.edit', ['id' => $funeral->id]) }}"
                                       class="btn btn-xs btn-info">
                                        <span class="glyphicon glyphicon-pencil">Edit</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('funeral.printPDF', ['id' => $funeral->id]) }}"
                                       class="btn btn-xs btn-info">
                                        <span class="glyphicon glyphicon-pencil">Print</span>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('funeral.destroy', ['id' => $funeral->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-danger" type="submit">
                                            <span class="glyphicon glyphicon-trash">Delete</span>
                                        </button>
                                    </form>
                                </td>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                            @endif
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                </div>
            </div>
        </div>

    </div>
    </div>

@endsection