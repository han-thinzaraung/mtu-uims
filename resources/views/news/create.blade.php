@extends('dashboard.index')
 
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-body align-items-center m-4">
                    <h3 class="text-dark mb-3"> Create News & Events </h3>

                    <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="col-auto">
                            <label  class="col-form-label">News & Event Title<small class="text-danger">*</small></label>
                            <input type="text"  class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">

                            @error('title')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror

                        </div>
                        <div class="col-auto">
                            <label class="col-form-label">Description<small class="text-danger">*</small></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ old('description') }}</textarea>
                            
                            @error('description')
                            <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-auto">
                            <label class="col-form-label">Upload Image<small class="text-danger">*</small></label>
                            <input type="file"  class="form-control" name="image">
 
                            @error('image')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
 
                        </div>
                        <div class="col-auto my-3">
                            <label class="col-form-label" for="start_date">Start Date:</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" >
                        </div>
                        <div class="col-auto my-3">
                            <label class="col-form-label" for="end_date">End Date:</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" >
                        </div>

                        <div class="col-sm mt-3">
                        <a href="{{ route('news.index') }}" class="btn btn-outline-dark">Back</a>
                        <button type="submit" class="btn btn-outline-primary">Create</button>
                        </div> 

                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection