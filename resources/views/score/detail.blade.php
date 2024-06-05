@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body shadow">
                    <h3 class="text-dark mb-3"> Admission Score Detail  </h3>
                    <table class="table">
                        <thead class="table-primary">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Acadmic Year</th>
                            <th scope="col">Gender</th>
                            <th>Top-Ranking Admission Score</th>
                            <th>BaseLine Admission Score</th>
                        </tr>
                        </thead>
                        <tbody>   
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $score->year->name }}</td>
                                <td>{{ ucfirst($score->gender) }}</td>
                                <td>{{ $score->highest_score }}</td>
                                <td>{{ $score->lowest_score }}</td>
                            </tr>
                        </tbody>     
                    </table>
                    <div class="mb-4">
                        <a href="{{ route('score.index') }}" class="btn btn-outline-dark">Back</a>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
