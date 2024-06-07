@extends('dashboard.index')
 
@section('content')
<div class="container">
    @php
    function sortYears($years) {
        return $years->sortBy('name');
    }
    @endphp

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-body align-items-center m-4">
                    <h3 class="text-dark mb-3"> Update Result Files </h3>

                    <form action="{{ route('result.update', $result->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                    
                        <div class="mt-3 mb-2 col-auto">
                            <label for="department_id" class="form-label">Select Department<small class="text-danger">*</small></label><br/>
                            <select name="department_id" id="department_id" class="form-control @error('department_id') is-invalid @enderror">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" 
                                        {{ old('department_id', $result->department_id) == $department->id ? 'selected' : '' }}>
                                        {{$department->name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        

                        <div class="mt-3 mb-2 col-auto">
                            <label for="year_id" class="form-label">Academic Year<small class="text-danger">*</small></label><br/>
                            <select name="year_id" id="year_id" class="form-control @error('year_id') is-invalid @enderror">
                                @foreach(sortYears($years) as $year)
                                    <option value="{{ $year->id }}" 
                                        {{ old('year_id', $result->year_id) == $year->id ? 'selected' : '' }}>
                                        {{ $year->name }} - {{ $year->semester }}
                                    </option>
                                @endforeach
                            </select>
                            @error('year_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        
                        <div class="col-auto">
                            <label class="col-form-label">Upload File<small class="text-danger">*</small></label>
                            <input type="file"  class="form-control" name="files[]" multiple>
 
                            @error('file')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-sm mt-3">
                        <a href="{{ route('result.index') }}" class="btn btn-outline-dark">Back</a>
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div> 
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection