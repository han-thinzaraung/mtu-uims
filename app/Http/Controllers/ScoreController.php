<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScoreRequest;
use App\Http\Requests\UpdateScoreRequest;
use App\Models\Department;
use App\Models\Year;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $years = Year::all();
        $selectedYear = $request->input('year');

        $scores = Score::when($selectedYear, function($query, $year) {
            return $query->where('year_id', $year);
        })->get();

        return view('score.index', compact('scores', 'years', 'selectedYear'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = Year::all();
        return view('score.create', compact('years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScoreRequest $request)
    {
        //return $request;
        $score = new Score();
        $score->year_id = $request->year_id;
        $score->gender = $request->gender;
        $score->highest_score = $request->highest_score;
        $score->lowest_score = $request->lowest_score;
        $score->save();
        return redirect()->route('score.index')->with('success','New Admission Score is created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $score = Score::find($id);
        return view('score.detail',compact('score'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        $years = Year::all();
        return view('score.edit', compact('years','score'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScoreRequest $request, Score $score)
    {
        $score->year_id = $request->year_id;
        $score->gender = $request->gender;
        $score->highest_score = $request->highest_score;
        $score->lowest_score = $request->lowest_score;
        $score->update();
        return redirect()->route('score.index')->with('update','Admission Scores are Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        if($score){
            $score->delete();
        }
        return redirect()->back()->with('delete','Admission Score For one Academic Year is Deleted Successfully');
    }
}
