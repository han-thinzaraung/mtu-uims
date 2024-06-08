@extends('dashboard.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body shadow">

                    <h3 class="text-dark mb-3"> Academic Year List </h3>

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
                            <th scope="col">Academic Year Name</th>
                            <th scope="col">Semester Name</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($years as $year)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $year->name }}</td>
                                <td>{{ $year->semester }}</td>
                                <td>
                                @if(auth()->user()->role == '0' || auth()->user()->role == '1')
                                    <a href="{{ route('year.edit', $year->id) }}" class="btn btn-outline-warning">
                                      <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @endif
                                    <a href="{{ route('year.show', $year->id) }}" class="btn btn-outline-primary">
                                        <i class="fas fa-info"></i>
                                    </a>
                                @if(auth()->user()->role == '0')
                                   <form method="post" action = "{{ route('year.destroy', $year->id) }}" class="d-inline-block">
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
                        {{ $years->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</div>
@endsection
