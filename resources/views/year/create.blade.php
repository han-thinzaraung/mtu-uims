@extends('dashboard.index')
 
@section('content')
<div class="container">
    @php
        function generateAcademicYears($startYear, $endYear) {
        $years = [];

        for ($year = $startYear; $year <= $endYear; $year++) {
            $nextYear = $year + 1;
            $years[] = "{$year} - {$nextYear}";
        }

        return $years;
        }
    @endphp

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-body align-items-center m-4">
                    <h3 class="text-dark mb-3"> Create Academic Year </h3>

                    <form action="{{ route('year.store') }}" method="post">
                        @csrf
                    
                        <div class="mt-3 mb-2 col-auto">
                            <label for="name" class="form-label">Academic Year Name<small class="text-danger">*</small></label><br/>
                            <select name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                                @foreach( generateAcademicYears(2020, 2030) as $name)
                                <option value="{{ $name }}" {{ old('name') == $name ? 'selected' : '' }}>{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-auto">
                            <label  class="col-form-label">Academic Year Name<small class="text-danger">*</small></label>
                            <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                            @error('name')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror

                        </div> --}}
                        <div class="col-auto">
                            <label class="col-form-label">Semester Name<small class="text-danger">*</small></label>
                            <select class="form-control @error('semester') is-invalid @enderror" name="semester">
                                <option value="">Select Semester</option>
                                <option value="semester I" {{ old('semester') == 'semester I' ? 'selected' : '' }}>Semester I</option>
                                <option value="semester II" {{ old('semester') == 'semester II' ? 'selected' : '' }}>Semester II</option>
                            </select>
                        
                            @error('semester')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                       
                        <div class="col-sm mt-3">
                        <a href="{{ route('year.index') }}" class="btn btn-outline-dark">Back</a>
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