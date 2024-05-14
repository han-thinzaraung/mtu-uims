@extends('dashboard.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body shadow">

                    <h3 class="text-dark mb-3"> User List </h3>

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
                  
                    <table class="table">
                    
                        <thead class="table-primary">
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Roll No.</th>
                            <th scope="col">Ph No.</th>
                            <th scope="col">Address</th>
                            <th scope="col">Registration No.</th>
                            <th scope="col">Position</th>
                            <th scope="col">Department</th>
                            <th scope="col">Academic Year</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
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
                                <td>{{ $user->roll_no }}</td>
                                <td>{{ $user->ph_no }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->registration_no }}</td>
                                <td>{{ $user->postion }}</td>
                                <td>{{ $user->department_id}}</td>
                                <td>{{ $user->year->name  }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-warning">
                                      <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-outline-primary">
                                        <i class="fas fa-info"></i>
                                    </a>
                                   <form method="post" action = "{{ route('user.destroy', $user->id) }}" class="d-inline-block">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash-alt"></i></button>
                                   </form>
                                </td> 
                            </tr> 
                            @endforeach
                        
                        </tbody>
                    </table>
                    
                </div>
             
            </div>
        </div>
    </div>
</div>
@endsection
