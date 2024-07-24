<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //dd (auth()->user()->role);

        if (auth()->user()->role == '3') {
            // For Teacher role, filter only students and teachers
            $users = User::whereIn('role', [3, 4])->get();
        } else if (auth()->user()->role == '2') {
            // For Student role, filter only students
            $users = User::where('role', 3)->get();
        } else {
            // For Admin or other roles, show all users
            $users = User::all();
        }
        

        return view('user.index', compact('users'));

        // $query = $request->input('query');

        // if (auth()->user()->role == '3') {
        //     $usersQuery = User::whereIn('role', [3, 4]);
        // } else if (auth()->user()->role == '2') {
        //     $usersQuery = User::where('role', 3);
        // } else {
        //     $usersQuery = User::query();
        // }
    
        // if ($query) {
        //     $users = $usersQuery->search($query)->paginate(5);
        // } else {
        //     $users = $usersQuery->paginate(5);
        // }
    
        // return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$user =Auth::user();
        //return $user;
        if(auth()->user()->role == '2' || auth()->user()->role == '3') {
            return redirect('/');
        }

        $years = Year::all();
        $departments = Department::all();

        return view('user.create', compact('years','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|integer',
            'password' => 'required|string|min:8',
            'roll_no' => 'nullable|string|max:255',
            'ph_no' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'registration_no' => 'nullable|string|max:255|unique:users,registration_no',
            'position' => 'nullable|string|max:255',
            'year' => 'nullable',
            'department' => 'nullable',
        ]);
        // return $validatedData;


        // Encrypt the password
        //$password = Hash::encrypt($validatedData['password']);
        // $password =  Hash::make($request->password);
        $password =Crypt::encrypt($request->password);

        // Create and save the user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $password;
        $user->roll_no = $request->roll_no ?? null;
        $user->ph_no = $request->ph_no ?? null;
        $user->address = $request->address ?? null;
        $user->registration_no = $request->registration_no ?? null;
        $user->position = $request->position ?? null;
        $user->department_id = $request->department;
        $user->year_id = $request->year;
        $user->save();  // Save the user to the database first

        
        // Redirect with success message
        return redirect()->route('user.index')->with('success', 'New User is Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = User::find($id);
        return view('user.detail',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::find($id);
        $years = Year::all();
        $departments = Department::all();
        return view('user.edit', compact('user','years','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            Rule::unique('users')->ignore($user->id),
        ],
        'role' => 'required|integer',
        'password' => 'nullable|string|min:8',
        'roll_no' => 'nullable|string|max:255',
        'ph_no' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'registration_no' => [
            'nullable',
            'string',
            'max:255',
            Rule::unique('users')->ignore($user->id),
            ],
        'position' => 'nullable|string|max:255',
        'year_id' => 'nullable|exists:years,id',
        'department_id' => 'nullable|exists:departments,id',
    ]);

    if ($validatedData['password']) {
        $user->password = Crypt::encrypt($validatedData['password']);
    }

    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->role = $validatedData['role'];
    $user->roll_no = $validatedData['roll_no'] ?? null;
    $user->ph_no = $validatedData['ph_no'] ?? null;
    $user->address = $validatedData['address'] ?? null;
    $user->registration_no = $validatedData['registration_no'] ?? null;
    $user->position = $validatedData['position'] ?? null;
    $user->year_id = $validatedData['year_id'] ?? null;
    $user->department_id = $validatedData['department_id'] ?? null;

    $user->update();

    return redirect()->route('user.index')->with('success', 'User is Updated Successfully');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
        }
        return redirect()->back()->with('delete','User is Deleted Successfully');
    }
}
