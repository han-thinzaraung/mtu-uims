@extends('dashboard.index')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-body shadow">

                    <h3 class="text-dark mb-3"> User List </h3>
                    <!-- <form action="{{ route('user.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Search by name" value="{{ request('query') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form> -->

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
                            <th class="text-nowrap">ID</th>
                            <th class="text-nowrap">User Name</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Role</th>
                            {{-- <th class="text-nowrap">Roll No.</th>
                            <th class="text-nowrap">Ph No.</th>
                            <th class="text-nowrap">Address</th>
                            <th class="text-nowrap">Registration No.</th> --}}
                            <!-- <th class="text-nowrap">Position</th> -->
                            <th class="text-nowrap">Department</th>
                            <th class="text-nowrap">Academic Year</th>
                            <th class="text-nowrap">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role == 0)
                                    Admin
                                    @elseif($user->role == 1)
                                    Agent
                                    @elseif($user->role == 2)
                                    Student
                                    @elseif($user->role == 3)
                                    Teacher
                                    @endif  
                                </td>
                                <!-- <td>{{ $user->roll_no }}</td>
                                <td>{{ $user->ph_no }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->registration_no }}</td>
                                <td>{{ $user->position }}</td> -->
                                <td>
                                {{ is_null( $user->department ) ? '' : $user->department->name }}
                                </td>
                                <td>
                                {{ is_null( $user->year ) ? '' : $user->year->name }}
                                </td>
                                <td>
                                @if(auth()->user()->role == '0' || auth()->user()->role == '1')
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-warning">
                                      <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @endif
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-outline-primary">
                                        <i class="fas fa-info"></i>
                                    </a>
                                @if(auth()->user()->role == '0')
                                   <form method="post" action = "{{ route('user.destroy', $user->id) }}" class="d-inline-block">
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
                        {{ $users->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</div>
@endsection
