@extends('dashboard.index')

@section('content')
    <div class="row mt-4">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>News & Events Detail</h3>
                </div>
                <div class="card-body">
                    <div class="container mt-4">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <h5>Title:</h5>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $news->title }}</p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <h5>Description:</h5>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $news->description}}</p>
                            </div>
                        </div>

                        <!-- <div class="row mb-2">
                            <div class="col-md-3">
                                <h5>Start Date:</h5>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $news->start_date }}</p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <h5>End Date:</h5>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $news->end_date }}</p>
                            </div>
                        </div> -->
                        <div class="row mb-2">
                        <div class="col-md-3">
                            <h5>Start Date:</h5>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $startDate }}</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3">
                            <h5>End Date:</h5>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $endDate }}</p>
                        </div>
                    </div>
                    
                        <div class="mb-4">
                        <div class="row">
                                <div class="col-md-6 mb-2">
                                <img src="{{ asset('storage/gallery/'.$news->image) }}" alt="{{ $news->image}}" class="img-fluid">
                                </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">Back to News & Events Lists</a>
                </div>
            </div>
        </div>
    </div>
@endsection
