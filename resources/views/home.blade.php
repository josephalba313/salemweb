@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card card-info">
            <div class="card-header text-center">
                Posts
            </div>
            <div class="card-block">
                <h1 class="text-center">
                    123
                </h1>
            </div>

        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-success">
            <div class="card-header text-center">
                Users
            </div>
            <div class="card-block">
                <h1 class="text-center">
                    123
                </h1>
            </div>

        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-success">
            <div class="card-header text-center">
                Categories
            </div>
            <div class="card-block">
                <h1 class="text-center">
                    2332
                </h1>
            </div>

        </div>
    </div>

</div>
{{--
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-default">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>

            </div>
        </div>
    </div>
--}}
@endsection
