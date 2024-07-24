@extends('dashboard.index')

@section('content')
<div class="container">
    <h1>News & Events</h1>


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
                  
    <!-- News & Events Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Preview Image</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($newss as $news)
                    <tr>
                        <td>{{ $news->title }}</td>
                        <td class="text-center">
                            <img src="{{ asset('storage/gallery/'.$news->image) }}" alt="{{ $news->image}}" style="max-width: 50px; max-height: 50px;">
                        </td>  
                        <td>{{ \Carbon\Carbon::parse($news->start_date)->format('d F, Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($news->end_date)->format('d F, Y') }}</td>
                        <td>
                        @if(auth()->user()->role == '0' || auth()->user()->role == '1')
                            <a href="{{ route('news.edit', $news->id) }}" class="btn btn-outline-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endif
                            <a href="{{ route('news.show', $news->id) }}" class="btn btn-outline-primary">
                                <i class="fas fa-info"></i>
                            </a>
                        @if(auth()->user()->role == '0')
                            <form method="post" action = "{{ route('news.destroy', $news->id) }}" class="d-inline-block">
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
            {{ $newss->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

    <!-- Create New Timetable Link -->
    @if(auth()->user()->role == '0' || auth()->user()->role == '1')
    <a href="{{ route('news.create') }}" class="btn btn-primary">Create New News & Event</a>
    @endif
</div>
@endsection
