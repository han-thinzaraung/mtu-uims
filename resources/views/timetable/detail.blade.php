@extends('dashboard.index')

@section('content')
    <div class="row mt-4">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Timetable Detail</h3>
                </div>
                <div class="card-body">
                    <div class="container mt-4">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <h5>Department:</h5>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $timetable->department->name }}</p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <h5>Academic Year:</h5>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $timetable->year->name }}</p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <h5>Semester:</h5>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $timetable->year->semester }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h5 class="mb-4">Uploaded Files:</h5>
                        <div class="row">
                            @foreach ($timetable->timetableImages as $file)
                                <div class="col-md-6 mb-2">
                                    <img src="{{ asset('storage/gallery/'.$file->file_path) }}" alt="{{ $file->file_path }}" class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="mt-3 d-flex justify-content-end">
                            {{ $timetables->links('vendor.pagination.bootstrap-4') }}
                        </div> --}}
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('timetable.index') }}" class="btn btn-secondary">Back to Timetables</a>
                </div>
            </div>
        </div>
    </div>
@endsection
