@extends('dashboard.index')
 
@section('content')
<div class="container">
    @php
        function filterUniqueYears($years) {
        $uniqueYears = [];

        foreach ($years as $year) {
            if (!in_array($year->name, array_column($uniqueYears, 'name'))) {
                $uniqueYears[] = $year;
            }
        }

        usort($uniqueYears, function($a, $b) {
            return strcmp($a->name, $b->name);
        });

        return $uniqueYears;
        }
    @endphp

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-body align-items-center m-4">
                    <h3 class="text-dark mb-3"> Create Admission Scores </h3>

                    <form action="{{ route('score.store') }}" method="post">
                        @csrf
                    
                        <div class="mt-3 mb-2 col-auto">
                            <label for="role" class="form-label">Academic Year<small class="text-danger">*</small></label><br/>
                          
                                <select name="year_id" id="year_id" class="form-control @error('year_id') is-invalid @enderror">
                                    @foreach(filterUniqueYears($years) as $year)
                                    <option value="{{ $year->id }}">{{$year->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="col-auto">
                            <label class="col-form-label">Gender<small class="text-danger">*</small></label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <label class="col-form-label">Top-Ranking Admission Score<small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('highest_score') is-invalid @enderror" name="highest_score" value="{{ old('highest_score') }}">

                            @error('highest_score')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <label class="col-form-label">Baseline Admission Score<small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('lowest_score') is-invalid @enderror" name="lowest_score" value="{{ old('lowest_score') }}">

                            @error('lowest_score')
                            <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                       
                        <div class="col-sm mt-3">
                        <a href="{{ route('score.index') }}" class="btn btn-outline-dark">Back</a>
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