@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body shadow">
                    <h3 class="text-dark mb-3"> Department Detail  </h3>
                    <table class="table">
                        <thead class="table-primary">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Department Name</th>
                            <th scope="col">Description</th>
                        </tr>
                        </thead>
                        <tbody>   
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->description }}</td>
                            </tr>
                        </tbody>     
                    </table>
                    <div class="mb-4">
                        <a href="{{ route('department.index') }}" class="btn btn-outline-dark">Back</a>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
