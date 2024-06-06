@extends('dashboard.index')

@section('content')
    <div class="row mt-4">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Timetable Details</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h4>Department:</h4>
                        <p>{{ $timetable->department->name }}</p>
                    </div>
                    <div class="mb-4">
                        <h4>Academic Year:</h4>
                        <p>{{ $timetable->year->name }}</p>
                    </div>
                    <div class="mb-4">
                        <h4>Semester:</h4>
                        <p>{{ $timetable->year->semester }}</p>
                    </div>
                    <div class="mb-4">
                        <h4>Uploaded Files:</h4>
                        <div class="row">
                            @foreach ($images as $image)
                                <div class="col-md-6 mb-2">
                                    <img src="{{ asset('storage/' . $image->file) }}" alt="Timetable Image" class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-3 d-flex justify-content-end">
                            {{ $images->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('timetables.index') }}" class="btn btn-secondary">Back to Timetables</a>
                    <a href="{{ route('timetables.edit', $timetable->id) }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ route('timetables.destroy', $timetable->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
