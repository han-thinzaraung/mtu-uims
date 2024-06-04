@extends('dashboard.index')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body align-items-center m-4">
                    <h3 class="text-dark mb-3"> Edit User </h3>

                    <form action="{{ route('user.store') }}" method="post">
                        @csrf

                        <div class="col-auto">
                            <label for="role">Select Role:<small class="text-danger">*</small></label>
                            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ $user->role }}">
                                <option value="0">Admin</option>
                                <option value="1">Agent</option>
                                <option value="2">Student</option>
                                <option value="3">Teacher</option>
                            </select>

                            @error('role')
                                <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                                <label class="col-form-label"> Name<small class="text-danger">*</small></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">

                                @error('name')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Email<small class="text-danger">*</small></label>
                                <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">

                                @error('email')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <!-- <div class="col-auto">
                                <label  class="col-form-label">Password<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $user->password  }}">

                                @error('password')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div> -->
                            <div class="col-auto">
                                <label  class="col-form-label">Ph No.<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('ph_no') is-invalid @enderror" name="ph_no" value="{{ $user->ph_no }}">

                                @error('ph_no')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Address<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}">

                                @error('address')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>

                        
                        <div id="position-field" style="display: none;">
                            
                            <div class="col-auto">
                                <label  class="col-form-label">Position<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('position') is-invalid @enderror" name="position" value="{{ $user->position }}">

                                @error('position')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>

                        </div>

                        
                      
                        <div id="student-field" style="display: none;">
                            
                            <div class="col-auto">
                                <label  class="col-form-label">Roll No.<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('roll_no') is-invalid @enderror" name="roll_no" value="{{ $user->roll_no }}">

                                @error('roll_no')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                           
                            <div class="col-auto">
                                <label  class="col-form-label">Registration No.<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('registration_no') is-invalid @enderror" name="registration_no" value="{{ $user->registration_no }}">

                                @error('registration_no')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3 mb-2 col-auto">
                            <label for="department" class="form-label">Select Department<small class="text-danger">*</small></label>
                            <select name="department" id="department" class="form-control @error('department') is-invalid @enderror">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>

                            @error('department')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>


                            <div class="mt-3 mb-2 col-auto">
                                <label for="year" class="form-label">Academic Year<small class="text-danger">*</small></label><br/>
                                    <select name="year" id="year" class="form-control @error('year') is-invalid @enderror">
                                    @foreach($years as $year)
                                        <option value="{{ $year->id }}">{{$year->name}}</option>
                                    @endforeach
                                    </select>
                            </div>
                        
                        <div class="col-sm mt-3 p-3">
                            <a href="{{ route('user.index') }}" class="btn btn-outline-dark">Back</a>
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const roleSelect = document.getElementById('role');
    const positionField = document.getElementById('position-field');
    const studentField = document.getElementById('student-field');

    function toggleFields() {
        const selectedRole = roleSelect.value;
        positionField.style.display = 'none';
        studentField.style.display = 'none';
        if (selectedRole === '0' || selectedRole === '1' || selectedRole === '3') {
            positionField.style.display = '';
        }
        else if (selectedRole === '2') {
            studentField.style.display = '';
        }

    }

    roleSelect.addEventListener('change', toggleFields);

    // Initialize the form with the correct fields shown
    toggleFields();
});
</script>
@endsection
