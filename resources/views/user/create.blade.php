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
                    <h3 class="text-dark mb-3"> Create User </h3>
                    <form action="{{ route('user.store') }}" method="post" onsubmit="return handleSubmit(event)">
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
                        <div class="col-auto">
                            <label class="col-form-label">Name<small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                            @error('name')
                                <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <label class="col-form-label">Email<small class="text-danger">*</small></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                            @error('email')
                                <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                        <!-- <div class="col-auto">
                            <label class="col-form-label">Password<small class="text-danger">*</small></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">

                            @error('password')
                                <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div> -->
                        <div class="col-auto">
                            <label class="col-form-label">Password<small class="text-danger">*</small></label>
                            <div class="input-group">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                    </span>
                                </div>
                            </div>

                            @error('password')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="col-auto">
                            <label class="col-form-label">Ph No.<small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('ph_no') is-invalid @enderror" name="ph_no" value="{{ old('ph_no') }}">

                            @error('ph_no')
                                <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <label class="col-form-label">Address<small class="text-danger">*</small></label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">

                            @error('address')
                                <div class="text-danger">*{{$message}}</div>
                            @enderror
                        </div>

                        <div id="position-field" style="display: none;">
                            <div class="col-auto">
                                <label class="col-form-label">Position<small class="text-danger">*</small></label>
                                <select class="form-control @error('position') is-invalid @enderror" name="position">
                                    <option value="" disabled selected>Select a position</option>
                                    <option value="Lecturer" {{ old('position') == 'Lecturer' ? 'selected' : '' }}>Lecturer</option>
                                    <option value="Professor" {{ old('position') == 'Professor' ? 'selected' : '' }}>Professor</option>
                                    <option value="Department Head" {{ old('position') == 'Department Head' ? 'selected' : '' }}>Department Head</option>
                                    <option value="Administrator" {{ old('position') == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                </select>

                                @error('position')
                                    <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div id="student-field" style="display: none;">
                            <div class="col-auto">
                                <label class="col-form-label">Roll No.<small class="text-danger">*</small></label>
                                <div class="input-group">
                                    <select id="y" class="form-control @error('y') is-invalid @enderror" name="y">
                                        <option value="" disabled selected>Select Year</option>
                                        <option value="I" {{ old('y') == 'I' ? 'selected' : '' }}>I</option>
                                        <option value="II" {{ old('y') == 'II' ? 'selected' : '' }}>II</option>
                                        <option value="III" {{ old('y') == 'III' ? 'selected' : '' }}>III</option>
                                        <option value="IV" {{ old('y') == 'IV' ? 'selected' : '' }}>IV</option>
                                        <option value="III" {{ old('y') == 'V' ? 'selected' : '' }}>V</option>
                                        <option value="IV" {{ old('y') == 'VI' ? 'selected' : '' }}>VI</option>
                                    </select>
                                    <input type="text" class="form-control" value="BE" readonly>
                                    <select id="d" class="form-control @error('d') is-invalid @enderror" name="d">
                                        <option value="" disabled selected>Select Department</option>
                                        <option value="CEIT" {{ old('d') == 'CEIT' ? 'selected' : '' }}>CEIT</option>
                                        <option value="EP" {{ old('d') == 'EP' ? 'selected' : '' }}>EP</option>
                                        <option value="EC" {{ old('d') == 'EC' ? 'selected' : '' }}>EC</option>
                                        <option value="M" {{ old('d') == 'M' ? 'selected' : '' }}>M</option>
                                        <option value="Civil" {{ old('d') == 'Civil' ? 'selected' : '' }}>Civil</option>
                                        <option value="Miniing" {{ old('d') == 'Miniing' ? 'selected' : '' }}>Miniing</option>
                                    </select>
                                    <input type="number" id="roll_number" class="form-control @error('roll_number') is-invalid @enderror" name="roll_number" value="{{ old('roll_number') }}" placeholder="Number">

                                    <input type="hidden" id="roll_no" name="roll_no" value="{{ old('roll_no') }}">

                                    @error('y')
                                        <div class="text-danger">*{{$message}}</div>
                                    @enderror
                                    @error('d')
                                        <div class="text-danger">*{{$message}}</div>
                                    @enderror
                                    @error('roll_number')
                                        <div class="text-danger">*{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-auto">
                                <label class="col-form-label">Registration No.<small class="text-danger">*</small></label>
                                <input type="text" class="form-control @error('registration_no') is-invalid @enderror" name="registration_no" value="{{ old('registration_no') }}">

                                @error('registration_no')
                                    <div class="text-danger">*{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3 mb-2 col-auto">
                            <label for="department" class="form-label">Select Department<small class="text-danger">*</small></label>
                            <select name="department" id="department" class="form-control @error('department') is-invalid @enderror">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3 mb-2 col-auto">
                            <label for="year" class="form-label">Academic Year<small class="text-danger">*</small></label>
                            <select name="year" id="year" class="form-control @error('year') is-invalid @enderror">
                                @foreach(filterUniqueYears($years) as $year)
                                    <option value="{{ $year->id }}">{{$year->name}}</option>
                                @endforeach
                            </select>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const roleSelect = document.getElementById('role');
    const positionField = document.getElementById('position-field');
    const studentField = document.getElementById('student-field');

    function toggleFields() {
        const selectedRole = roleSelect.value;
        positionField.style.display = 'none';
        studentField.style.display = 'none';

        // Remove required attribute when fields are hidden
        document.querySelectorAll('#position-field select, #student-field select, #student-field input').forEach(el => {
            el.removeAttribute('required');
        });

        if (selectedRole === '3') { // Teacher
            positionField.style.display = 'block';
            document.querySelectorAll('#position-field select').forEach(el => {
                el.setAttribute('required', 'required');
            });
        } else if (selectedRole === '2') { // Student
            studentField.style.display = 'block';
            document.querySelectorAll('#student-field select, #student-field input').forEach(el => {
                el.setAttribute('required', 'required');
            });
        }
    }

    roleSelect.addEventListener('change', toggleFields);

    // Initialize the form with the correct fields shown
    toggleFields();
});

function handleSubmit(event) {
    const role = document.getElementById('role').value;
    if (role === '2') {
        combineRollNo();
    }
    return true;
}

function combineRollNo() {
    var year = document.getElementById('y').value;
    var department = document.getElementById('d').value;
    var rollNumber = document.getElementById('roll_number').value;
    document.getElementById('roll_no').value = year + '-BE-' + department + '-' + rollNumber;
}

// Open/Close Eye
function togglePassword() {
        const passwordField = document.getElementById('password');
        const togglePasswordIcon = document.getElementById('togglePasswordIcon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            togglePasswordIcon.classList.remove('fa-eye');
            togglePasswordIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            togglePasswordIcon.classList.remove('fa-eye-slash');
            togglePasswordIcon.classList.add('fa-eye');
        }
    }
</script>

@endsection
