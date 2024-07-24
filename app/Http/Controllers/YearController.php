<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreYearRequest;
use App\Http\Requests\UpdateYearRequest;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()   
    // {
       
    // }

    public function index()
    {
        
        $years = Year::orderBy("years.id")->paginate(5);
        //$years = Year::all();
        return view('year.index',compact('years'));
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

            
        return view('year.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreYearRequest $request)
    {
        $year = new Year();
        $year->name = $request->name;
        $year->semester = $request->semester;
        $year->save();
        return redirect()->route('year.index')->with('success','New Academic Year is created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Year $year)
    {
        return view('year.detail',compact('year'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Year $year)
    {
        return view('year.edit', compact('year'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateYearRequest $request,Year $year)
    {
        $year->name = $request->name;
        $year->semester = $request->semester;
        $year->update();
        return redirect()->route('year.index')->with('update','Academic Year is Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Year $year)
    {
        if($year){
            $year->delete();
        }
        return redirect()->back()->with('delete','Academic Year is Deleted Successfully');
    }
}
