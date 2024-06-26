@extends('dashboard.index')

@section('content')
<div class="container">
    @php
    function sortYears($years) {
        return $years->sortBy('name');
    }
    @endphp

    <h1>Timetables</h1>

    <!-- Filter Form -->
<form method="GET" action="{{ route('timetable.index') }}" class="mb-4">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="department_id" class="form-label">Department:</label>
            <select name="department_id" id="department_id" class="form-control">
                <option value="">All</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="year_id" class="form-label">Academic Year:</label>
            <select name="year_id" id="year_id" class="form-control">
                <option value="">All</option>
                @foreach(sortYears($years) as $year)
                    <option value="{{ $year->id }}">{{ $year->name }} - {{ $year->semester }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 mb-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>
</form>


    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert"> 
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            {{ session('success') }}
        </div>
        @endif

        @if(session('update'))
        <div class="alert alert-primary alert-dismissible" role="alert"> 
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            {{ session('update') }}
        </div>
        @endif

        @if(session('delete'))
        <div class="alert alert-danger alert-dismissible" role="alert"> 
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            {{ session('delete') }}
        </div>
        @endif
                  
    <!-- Timetable Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Department</th>
                    <th>Academic Year</th>
                    <th>Semester</th>
                    <th>Timetable</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($timetables as $timetable)
                    <tr>
                        <td>{{ $timetable->department->name }}</td>
                        <td>{{ $timetable->year->name }}</td>
                        <td>{{ $timetable->year->semester }}</td>
                        <td>
                            @foreach ($timetable->timetableImages as $file)
                            {{-- {{ $file->file_path }} --}}
                                <img src="{{ asset('storage/gallery/'.$file->file_path) }}" alt="{{ $file->file_path }}" style="max-width: 50px; max-height: 50px;">
                            @endforeach
                        </td>                  
                        <td>
                        @if(auth()->user()->role == '0' || auth()->user()->role == '1')
                            <a href="{{ route('timetable.edit', $timetable->id) }}" class="btn btn-outline-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endif
                            <a href="{{ route('timetable.show', $timetable->id) }}" class="btn btn-outline-primary">
                                <i class="fas fa-info"></i>
                            </a>
                        @if(auth()->user()->role == '0')
                            <form method="post" action = "{{ route('timetable.destroy', $timetable->id) }}" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        @endif
                        </td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $timetables->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
    
    <!-- Create New Timetable Link -->
    @if(auth()->user()->role == '0' || auth()->user()->role == '1')
    <a href="{{ route('timetable.create') }}" class="btn btn-primary">Create New Timetable</a>
    @endif
</div>
@endsection
