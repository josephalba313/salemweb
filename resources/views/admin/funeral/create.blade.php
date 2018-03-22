@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Create New Funeral Service</div>

            <div class="card-body">

                <form action="{{ route('funeral.store') }}" method="POST"   enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Deceased Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="funeral_date">Funeral Date</label>
                        <input type="date" name="funeral_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="death_date">Date Died</label>
                        <input type="date" name="death_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" name="birthday" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="requirement">Requirement: Death Certificate (Scanned Image)</label>
                        <input type="file" name="requirement" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Store Funeral Service</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
