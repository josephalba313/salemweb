@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.include.errors')
        <div class="card card-default">
            <div class="card-header">Edit Child Dedication - {{ $dedication->name }}</div>

            <div class="card-body">

                <form action="{{ route('dedication.update', ['id' => $dedication->id]) }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Child's Name</label>
                        <input type="text" name="name" value="{{ $dedication->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" name="birthday" value="{{ $dedication->birthday }}" class="form-control">
                    </div>
                    <div class="form-group">

                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="M"  {{ ($dedication->gender = "M") ? "SELECTED" : "" }}>Male</option>
                            <option value="F" {{ ($dedication->gender = "F") ? "SELECTED" : "" }}>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="father">Father</label>
                        <input type="text" name="father" value="{{ $dedication->father }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mother">Mother</label>
                        <input type="text" name="mother" value="{{ $dedication->mother }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="dedication_date">Dedication Date</label>
                        <input type="date" name="dedication_date" value="{{ $dedication->dedication_date }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="requirement">Requirement: Birth Certificate (Scanned Image)</label>
                        <input type="file" name="requirement" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">Update Child Dedication</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
