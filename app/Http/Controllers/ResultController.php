<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Result;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Mail\ResultNotification;
use App\Jobs\SendResultNotification;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreYearRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{ 
    $departments = Department::all();
    $years = Year::all();

    $query = Result::query();

    // Check the authenticated user's role
    $role = auth()->user()->role;

    // Restrict department list based on user's role
    if ($role == '2') { // For Student role
        $query->where('department_id', auth()->user()->department_id);
    } elseif ($role == '3') { // For Teacher role
        $query->whereHas('department', function ($q) {
            $q->whereIn('id', [auth()->user()->department_id]);
        });
    }

    if ($request->filled('department_id')) {
        $query->where('department_id', $request->department_id);
    }

    if ($request->filled('year_id')) {
        $query->where('year_id', $request->year_id);
    }


    $results = $query->with('department', 'year')->paginate(5);

    return view('result.index', compact('results', 'departments', 'years'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $departments = Department::all();
        $years = Year::all();

       
        return view('result.create', compact('departments', 'years'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResultRequest $request)
    {
          //return $request;
          $result = new Result();
          $result->department_id = $request->department_id;
          $result->year_id = $request->year_id;
          $result->save();
   
          foreach ($request->file('files') as $file) {
              if ($file) {
                $filePath = $file->store('pdfs', 'public');    
                $fileName = $file->getClientOriginalName();       
                  $result->resultFiles()->create([
                      'file_path' => $filePath,
                      'file_name' => $fileName
                  ]);
              }
          }

        // Mail::to('myatkhine257@gmail.com')->send(new ResultNotification());

        // Get the users to notify
            // $users = User::all(); 

            // foreach ($users as $user) {
            //     SendResultNotification::dispatch($user);
            // }
          
              return redirect()->route('result.index')->with('success', 'New Result File is Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Result::find($id);
        return view('result.detail',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        $departments = Department::all();
        $years = Year::all();
        return view('result.edit', compact('departments','years','result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResultRequest $request, Result $result)
    {
        
        // If new files are provided, delete existing files and update with new files
        if ($request->hasFile('files')) {
            // Delete existing files associated with the result
            foreach ($result->resultFiles as $file) {
                Storage::delete("public/{$file->file_path}");
                $file->delete();
            }
            //return $request;

            $result->year_id = $request->year_id;
            $result->department_id = $request->department_id;
            $result->update();

            // Create new result images
            foreach ($request->file('files') as $file) {
                if ($file) {
                    $filePath = $file->store('pdfs', 'public');    
                    $fileName = $file->getClientOriginalName();       
                    $result->resultFiles()->create([
                      'file_path' => $filePath,
                      'file_name' => $fileName
                  ]);
                    
                }else {
                    // If no new files are provided, update only the result information
                    $result->year_id = $request->year_id;
                    $result->department_id = $request->department_id;
                    $result->update();
    
                    
                }
            }
            return redirect()->route('result.index')->with('success', 'Result is Updated successfully');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        if($result){
            $result->delete();
        }
        return redirect()->back()->with('delete','Result File is Deleted Successfully');
    }
}
