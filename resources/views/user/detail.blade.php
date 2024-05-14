@extends('dashboard.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body shadow">
                    <h3 class="text-dark mb-3"> User Detail </h3>
                    <table class="table">
                        <thead class="table-primary">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Ph No.</th>
                            <th scope="col">Address</th>
                            
                            <th scope="col">Position</th>
                            <th scope="col">Department</th>
                            <th scope="col">Academic Year</th>
                          </tr>
                        </thead>
                        <tbody>   
                        
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role == "0")
                                    Admin
                                    @elseif($user->role == "1")
                                    Agent
                                    @elseif($user->role == "2")
                                    Student
                                    @elseif($user->role == "3")
                                    Teacher
                                    @endif  
                                </td>
                                
                                <td>{{ $user->ph_no }}</td>
                                <td>{{ $user->address }}</td>
                                
                                <td>{{ $user->position }}</td>
                                
                                <td>{{ $user->department->name }}</td>
                               
                                <td>{{ $user->year->name  }}</td>
                            </tr>
                        </tbody>     
                    </table>
                    <div class="mb-4">
                        <a href="{{ route('user.index') }}" class="btn btn-outline-dark">Back</a>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
