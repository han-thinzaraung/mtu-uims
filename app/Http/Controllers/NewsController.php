<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $newss = News::orderBy("news.id")->paginate(5);
    //     return view('news.index',compact('newss'));
    // }

    public function index()
    {
        $newss = News::orderBy("news.id")->paginate(5);

        // Format the dates for each news item
        $newss->getCollection()->transform(function ($news) {
            $news->start_date = Carbon::parse($news->start_date)->format('d F, Y');
            $news->end_date = Carbon::parse($news->end_date)->format('d F, Y');
            return $news;
        });

        return view('news.index', compact('newss'));
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
        
        return view('news.create');

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
        $news = new News();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->start_date = $request->start_date;
        $news->end_date = $request->end_date;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newName = "gallery_" . uniqid() . "." . $image->extension();
            $imagePath = $image->storeAs("public/gallery", $newName);
            $news->image = $newName;
        }
        $news->save();

        return redirect()->route('news.index')->with('success','New News and Events are created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $startDate = Carbon::parse($news->start_date)->format('d F, Y');
        $endDate = Carbon::parse($news->end_date)->format('d F, Y');
        return view('news.detail', compact('news', 'startDate', 'endDate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //return $request;
        $news->title = $request->title;
        $news->description = $request->description;
        $news->start_date = $request->start_date;
        $news->end_date = $request->end_date;
      
        if ($request->hasFile('image')) {
            // Delete existing image if there is one
            if ($news->image) {
                Storage::delete("public/gallery/{$news->image}");
            }
    
            // Store new image
            $image = $request->file('image');
            $newName = "gallery_" . uniqid() . "." . $image->extension();
            $imagePath = $image->storeAs("public/gallery", $newName);
            $news->image = $newName;
        }
        $news->update();
        return redirect()->route('news.index')->with('update','News and Events are Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if($news){
            $news->delete();
        }
        return redirect()->back()->with('delete','News & Event Name is Deleted Successfully');
    }
}
