@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <div class="col-5">
                        <h4>
                            Baptismal List
                        </h4>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('baptismal.create') }}" class="btn btn-xs btn-primary">
                            <span class="glyphicon glyphicon-pencil">New</span>
                        </a>
                    </div>
                    <div class="col-5">
                        <a href="{{ route('baptismal.approved') }}" class="btn btn-xs btn-info">
                            Approved
                        </a>

                        <a href="{{ route('baptismal.pending') }}" class="btn btn-xs btn-info">
                            Pending
                        </a>

                        <a href="{{ route('baptismal.all') }}" class="btn btn-xs btn-info">
                            All
                        </a>
                    </div>
                </div>
            </div>


                <div class="container">
                    <div class="row">

                <table class="table table-hover">
                    <thead>
                    <th>Approval</th>
                    <th>
                        Birth Certificate
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Date
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
                    @foreach($baptismals as $baptismal)
                        <tr>
                            @if(Auth::user()->admin == 4)
                                <td>
                                    @if( $baptismal->approved == 0)
                                        <a href="{{ route('baptismal.approve', ['id' => $baptismal->id]) }}"
                                           class="btn btn-xs btn-success">
                                            <span class="glyphicon glyphicon-pencil">Approve</span>
                                        </a>
                                    @else
                                        Approved
                                    @endif
                                </td>
                            @else
                                <td>
                                    {{ $baptismal->approved == 0 ? 'Pending' : 'Approved' }}
                                </td>
                            @endif
                            <td>
                                <img src="{{ $baptismal->requirement }}" alt="Birth Certificate is required"
                                     width="90px"
                                     height="50px">
                            </td>

                            <td>
                                {{ $baptismal->name }}
                            </td>

                            <td>
                                {{ $baptismal->baptismal_date }}
                            </td>
                            <td>
                                @if($baptismal->approved==1)
                                    {{ $baptismal->approved_user->name }}
                                @endif
                            </td>
                            @if((Auth::user()->admin==1) or (Auth::user()->admin==4) or(Auth::id()==$baptismal->user_id))

                                <td>
                                    <a href="{{ route('baptismal.edit', ['id' => $baptismal->id]) }}"
                                       class="btn btn-xs btn-info">
                                        <span class="glyphicon glyphicon-pencil">Edit</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('baptismal.printPDF', ['id' => $baptismal->id]) }}"
                                       class="btn btn-xs btn-info">
                                        <span class="glyphicon glyphicon-pencil">Print</span>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('baptismal.destroy', ['id' => $baptismal->id]) }}"
                                          method="POST">
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

@endsection