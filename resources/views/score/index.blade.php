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

    <h1>Admission Scores</h1>
    
    <form action="{{ route('score.index') }}" method="GET">
        <div class="form-group">
            <label for="year">Filter by Academic Year</label>
            <select name="year" id="year" class="form-control">
                <option value="">-- Select Year --</option>
                @foreach(filterUniqueYears($years) as $year)
                    <option value="{{ $year->id }}" {{ $selectedYear == $year->id ? 'selected' : '' }}>{{ $year->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    @if(auth()->user()->role == '0' || auth()->user()->role == '1')
    <a href="{{ route('score.create') }}" class="btn btn-success mt-3">Add New Score</a>
    @endif
    <h6 class="text-primary py-3">These Scores are determined by the addition of only 4 subjects [ English, Mathematics, Chemistry and Physics. ]</h6>
    
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
        

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Year</th>
                <th>Gender</th>
                <th>Top-Ranking Admission Score</th>
                <th>BaseLine Admission Score</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $startIndex = ($scores->currentPage() - 1) * $scores->perPage() + 1;
                    if ($scores->currentPage() > 1) {
                        $startIndex = ($scores->currentPage() - 1) * $scores->perPage() + 1;
                    }
                @endphp
                @foreach ($scores as $index => $score)
                    <tr>
                        <th scope="row">{{ $startIndex + $loop->index }}</th>
                        <td>{{ $score->year->name }}</td>
                        <td>{{ ucfirst($score->gender) }}</td>
                        <td>{{ $score->highest_score }}</td>
                        <td>{{ $score->lowest_score }}</td>
                        <td>
                        @if(auth()->user()->role == '0' || auth()->user()->role == '1')
                            <a href="{{ route('score.edit', $score->id) }}" class="btn btn-outline-warning">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endif
                            <a href="{{ route('score.show', $score->id) }}" class="btn btn-outline-primary">
                                <i class="fas fa-info"></i>
                            </a>
                        @if(auth()->user()->role == '0')
                            <form method="post" action = "{{ route('score.destroy', $score->id) }}" class="d-inline-block">
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
        {{ $scores->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection
