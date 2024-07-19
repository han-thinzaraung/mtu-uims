@extends('dashboard.index')

@section('content')
    <div class="row mt-4">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Result File Detail</h3>
                </div>
                <div class="card-body">
                    <div class="container mt-4">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <h5>Department:</h5>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $result->department->name }}</p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <h5>Academic Year:</h5>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $result->year->name }}</p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <h5>Semester:</h5>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $result->year->semester }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <h5>Uploaded Files:</h5>
                        </div>
                        <div class="col-md-9">
                            @foreach ($result->resultFiles as $file)
                            <div class="file-item" data-file-url="{{ asset('storage/' . $file->file_path) }}">
                                {{-- {{ $file->file_path }} --}}  
                                <p class="text-primary">{{ $file->file_name }} </p>
                            </div>                         
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('result.index') }}" class="btn btn-secondary">Back to Results</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('.file-item').on('dblclick', function() {
            var fileUrl = $(this).data('file-url');
            console.log('File URL:', fileUrl); // Debugging line
            if(fileUrl) {
                window.open(fileUrl, '_blank');
            } else {
                console.error('File URL not found');
            }
        });
    });
</script>
@endsection
