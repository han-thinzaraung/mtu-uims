<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimetableRequest;
use App\Http\Requests\UpdateTimetableRequest;
use App\Models\Year;
use App\Models\Timetable;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TimetableController extends Controller
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

    $query = Timetable::query();

    // Check the authenticated user's role
    $role = auth()->user()->role;

    // Restrict department list based on user's role
    if ($role == '2') { // For Student role
        $query->whereHas('department', function ($q) {
            $q->where('id', auth()->user()->department_id);
        });
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


    $timetables = $query->with('department', 'year')->paginate(5);

    return view('timetable.index', compact('timetables', 'departments', 'years'));
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

        return view('timetable.create', compact('departments', 'years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimetableRequest $request)
    {
        //return $request;
        $timetable = new Timetable();
        $timetable->department_id = $request->department_id;
        $timetable->year_id = $request->year_id;
        $timetable->save();
 
        foreach ($request->file('files') as $file) {
            if ($file) {
                $newName = "gallery_" . uniqid() . "." . $file->extension();
                $filePath = $file->storeAs("public/gallery", $newName);
        
                $timetable->timetableImages()->create([
                    'file_path' => $newName, 
                ]);
            }
        }
        
            return redirect()->route('timetable.index')->with('success', 'New Timetable is Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timetable = Timetable::find($id);
        return view('timetable.detail',compact('timetable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Timetable $timetable)
    {
        $departments = Department::all();
        $years = Year::all();

        return view('timetable.edit', compact('timetable', 'departments', 'years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimetableRequest $request, Timetable $timetable)
    {
        
        // If new files are provided, delete existing files and update with new files
        if ($request->hasFile('files')) {
            // Delete existing files associated with the timetable
            foreach ($timetable->timetableImages as $file) {
                Storage::delete("public/gallery/{$file->file_path}");
                $file->delete();
            }
            //return $request;

            $timetable->year_id = $request->year_id;
            $timetable->department_id = $request->department_id;
            $timetable->update();

            // Create new timetable images
            foreach ($request->file('files') as $file) {
                if ($file) {
                    $newName = "gallery_" . uniqid() . "." . $file->extension();
                    $file->storeAs("public/gallery", $newName);
            
                    $timetable->timetableImages()->create([
                        'file_path' => $newName,
                    ]);
                }else {
                    // If no new files are provided, update only the timetable information
                    $timetable->year_id = $request->year_id;
                    $timetable->department_id = $request->department_id;
                    $timetable->update();
    
                    
                }
            }
            return redirect()->route('timetable.index')->with('success', 'Timetable is Updated successfully');

    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $timetable)
    {
        if($timetable){
            $timetable->delete();
        }
        return redirect()->back()->with('delete','Timetable is Deleted Successfully');
    }
}
