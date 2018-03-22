@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <div class="col-5">
                        <h4>
                            Child Dedication List
                        </h4>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('dedication.create') }}" class="btn btn-xs btn-primary">
                            <span class="glyphicon glyphicon-pencil">New</span>
                        </a>
                    </div>
                    <div class="col-5">
                        <a href="{{ route('dedication.approved') }}" class="btn btn-xs btn-info">
                            Approved
                        </a>

                        <a href="{{ route('dedication.pending') }}" class="btn btn-xs btn-info">
                            Pending
                        </a>

                        <a href="{{ route('dedication.all') }}" class="btn btn-xs btn-info">
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
                        Birth Certificate
                    </th>
                    <th>
                        Child's Name
                    </th>
                    <th>
                        Father
                    </th>
                    <th>
                        Mother
                    </th>
                    <th>
                        Dedication
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
                    @foreach($dedications as $dedication)
                        <tr>
                            @if(Auth::user()->admin == 4)
                                <td>
                                    @if( $dedication->approved == 0)
                                        <a href="{{ route('dedication.approve', ['id' => $dedication->id]) }}"
                                           class="btn btn-xs btn-success">
                                            <span class="glyphicon glyphicon-pencil">Approve</span>
                                        </a>
                                    @else
                                        Approved
                                    @endif
                                </td>
                            @else
                                <td>
                                    {{ $dedication->approved == 0 ? 'Pending' : 'Approved' }}
                                </td>
                            @endif

                            <td>
                                <img src="{{ $dedication->requirement }}" alt="Birth Certificate is required"
                                     width="90px"
                                     height="50px">
                            </td>

                            <td>
                                {{ $dedication->name }}
                            </td>
                            <td>
                                {{ $dedication->father }}
                            </td>
                            <td>
                                {{ $dedication->mother }}
                            </td>
                            <td>
                                {{ $dedication->dedication_date }}
                            </td>
                            <td>
                                @if($dedication->approved==1)
                                    {{ $dedication->approved_user->name }}
                                @endif
                            </td>
                            @if((Auth::user()->admin==1) or (Auth::user()->admin==4) or(Auth::id()==$dedication->user_id))

                                <td>
                                    <a href="{{ route('dedication.edit', ['id' => $dedication->id]) }}"
                                       class="btn btn-xs btn-info">
                                        <span class="glyphicon glyphicon-pencil">Edit</span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('dedication.printPDF', ['id' => $dedication->id]) }}"
                                       class="btn btn-xs btn-info">
                                        <span class="glyphicon glyphicon-pencil">Print</span>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('dedication.destroy', ['id' => $dedication->id]) }}"
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