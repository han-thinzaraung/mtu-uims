@extends('dashboard.index')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body align-items-center m-4">
                    <h3 class="text-dark mb-3"> Create User </h3>

                    <form action="{{ route('user.store') }}" method="post">
                        @csrf

                        <div class="col-auto">
                            <label for="role">Select Role:<small class="text-danger">*</small></label>
                            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                <option value="0">Admin</option>
                                <option value="1">Agent</option>
                                <option value="2">Student</option>
                                <option value="3">Teacher</option>
                            </select>

                            @error('role')
                                <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>

                        
                        <div id="admin-fields" style="display: none;">
                            <div class="col-auto">
                                <label class="col-form-label">Admin Name<small class="text-danger">*</small></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                                @error('name')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Email<small class="text-danger">*</small></label>
                                <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                @error('email')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Password<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">

                                @error('password')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Ph No.<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('ph_no') is-invalid @enderror" name="ph_no" value="{{ old('ph_no') }}">

                                @error('ph_no')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Address<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">

                                @error('address')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Position<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}">

                                @error('position')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mt-3 mb-2 col-auto">
                                <label for="role" class="form-label">Department<small class="text-danger">*</small></label><br/>
                                @foreach($departments as $department)
                                    <input type="checkbox" value="{{ $department->id }}" name="department_id[]">
                                    <label for="department{{ $department->id }}" class="m-3">{{ $department->name }}</label>
                                @endforeach
                            </div>

                            <div class="mt-3 mb-2 col-auto">
                                <label for="role" class="form-label">Academic Year<small class="text-danger">*</small></label><br/>
                                @foreach($years as $year)
                                    <input type="checkbox" value="{{ $year->id }}" name="year_id[]">
                                    <label for="year{{ $year->id }}" class="m-3">{{ $year->name }}</label>
                                @endforeach
                            </div>
                        </div>
                        

                       
                        <div id="agent-fields" style="display: none;">
                            <div class="col-auto">
                                <label class="col-form-label">Agent Name<small class="text-danger">*</small></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                                @error('name')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Email<small class="text-danger">*</small></label>
                                <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                @error('email')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Password<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">

                                @error('password')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Ph No.<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('ph_no') is-invalid @enderror" name="ph_no" value="{{ old('ph_no') }}">

                                @error('ph_no')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Address<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">

                                @error('address')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Position<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}">

                                @error('position')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-auto">
                                <label for="role" class="form-label">Department<small class="text-danger">*</small></label><br/>
                                @foreach($departments as $department)
                                    <input type="checkbox" value="{{ $department->id }}" name="department_id[]">
                                    <label for="department{{ $department->id }}" class="m-3">{{ $department->name }}</label>
                                @endforeach
                            </div>

                            <div class="col-auto">
                                <label for="role" class="form-label">Academic Year<small class="text-danger">*</small></label><br/>
                                @foreach($years as $year)
                                    <input type="checkbox" value="{{ $year->id }}" name="year_id[]">
                                    <label for="year{{ $year->id }}" class="m-3">{{ $year->name }}</label>
                                @endforeach
                            </div>
                        </div>
                       

                      
                        <div id="student-fields" style="display: none;">
                            <div class="col-auto">
                                <label class="col-form-label">Student Name<small class="text-danger">*</small></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                                @error('name')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Email<small class="text-danger">*</small></label>
                                <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                @error('email')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Password<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">

                                @error('password')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Roll No.<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('roll_no') is-invalid @enderror" name="roll_no" value="{{ old('roll_no') }}">

                                @error('roll_no')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Ph No.<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('ph_no') is-invalid @enderror" name="ph_no" value="{{ old('ph_no') }}">

                                @error('ph_no')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Address<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">

                                @error('address')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Registration No.<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('registration_no') is-invalid @enderror" name="registration_no" value="{{ old('registration_no') }}">

                                @error('registration_no')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-auto">
                                <label for="role" class="form-label">Department<small class="text-danger">*</small></label><br/>
                                @foreach($departments as $department)
                                    <input type="checkbox" value="{{ $department->id }}" name="department_id[]">
                                    <label for="department{{ $department->id }}" class="m-3">{{ $department->name }}</label>
                                @endforeach
                            </div>

                            <div class="col-auto">
                                <label for="role" class="form-label">Academic Year<small class="text-danger">*</small></label><br/>
                                @foreach($years as $year)
                                    <input type="checkbox" value="{{ $year->id }}" name="year_id[]">
                                    <label for="year{{ $year->id }}" class="m-3">{{ $year->name }}</label>
                                @endforeach
                            </div>
                        </div>
                        

                        
                        <div id="teacher-fields" style="display: none;">
                            <div class="col-auto">
                                <label class="col-form-label">Teacher Name<small class="text-danger">*</small></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                                @error('name')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Email<small class="text-danger">*</small></label>
                                <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                @error('email')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Password<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">

                                @error('password')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Ph No.<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('ph_no') is-invalid @enderror" name="ph_no" value="{{ old('ph_no') }}">

                                @error('ph_no')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Address<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">

                                @error('address')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <label  class="col-form-label">Position<small class="text-danger">*</small></label>
                                <input type="text"  class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}">

                                @error('position')
                                <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-auto">
                                <label for="role" class="form-label">Department<small class="text-danger">*</small></label><br/>
                                @foreach($departments as $department)
                                    <input type="checkbox" value="{{ $department->id }}" name="department_id[]">
                                    <label for="department{{ $department->id }}" class="m-3">{{ $department->name }}</label>
                                @endforeach
                            </div>

                            <div class="col-auto">
                                <label for="role" class="form-label">Academic Year<small class="text-danger">*</small></label><br/>
                                @foreach($years as $year)
                                    <input type="checkbox" value="{{ $year->id }}" name="year_id[]">
                                    <label for="year{{ $year->id }}" class="m-3">{{ $year->name }}</label>
                                @endforeach
                            </div>
                            
                        </div>
            

                        <div class="col-sm mt-3 p-3">
                            <a href="{{ route('user.index') }}" class="btn btn-outline-dark">Back</a>
                            <button type="submit" class="btn btn-outline-primary">Create</button>
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
    const adminFields = document.getElementById('admin-fields');
    const agentFields = document.getElementById('agent-fields');
    const studentFields = document.getElementById('student-fields');
    const teacherFields = document.getElementById('teacher-fields');

    function toggleFields() {
        adminFields.style.display = roleSelect.value == '0' ? '' : 'none';
        agentFields.style.display = roleSelect.value == '1' ? '' : 'none';
        studentFields.style.display = roleSelect.value == '2' ? '' : 'none';
        teacherFields.style.display = roleSelect.value == '3' ? '' : 'none';
    }

    roleSelect.addEventListener('change', toggleFields);

    // Initialize the form with the correct fields shown
    toggleFields();
});
</script>
@endsection
