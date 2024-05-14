<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $years = Year::all();
        $departments = Department::all();
        return view('user.index',compact('users','years','departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // return $request;
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|integer',
            'password' => 'required|string|min:8',
            'roll_no' => 'nullable|string|max:255',
            'ph_no' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'registration_no' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'year' => 'nullable',
            'department' => 'nullable',
        ]);
        // return $validatedData;


        // Encrypt the password
        //$password = Hash::encrypt($validatedData['password']);
        $password =  Hash::make($request->password);

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
        // return $request;
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|integer',
            'password' => 'required|string|min:8',
            'roll_no' => 'nullable|string|max:255',
            'ph_no' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'registration_no' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'year_id' => 'nullable|exists:years,id',
            'department_id' => 'nullable|exists:departments,id',
        ]);


        // Encrypt the password
        $password =  Hash::make($validatedData['password']);


        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];
        $user->password = $password;
        $user->roll_no = $validatedData['roll_no'] ?? null;
        $user->ph_no = $validatedData['ph_no'] ?? null;
        $user->address = $validatedData['address'] ?? null;
        $user->registration_no = $validatedData['registration_no'] ?? null;
        $user->position = $validatedData['position'] ?? null;
        $user->update();  // Save the user to the database first

        // Attach year and department after saving the user
        if ($request->has('year_id')) {
            $user->year()->attach($validatedData['year_id']);
        }

        if ($request->has('department_id')) {
            $user->department()->attach($validatedData['department_id']);
        }

        // Redirect with success message
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
