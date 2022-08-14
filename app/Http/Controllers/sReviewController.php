<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sreview = DB::select('select * from song_reviews');
        return view('pages.sReview', compact('sreview'));
    }

    public function ViewSReview()
    {
        $users = DB::select('select * from users');
        $songs = DB::select('select * from songs');
        $sreview = DB::select('SELECT sr.id, u.name, s.title, sr.review FROM song_reviews sr JOIN users u on sr.user_id = u.id JOIN songs s on sr.song_id = s.id; ');
        return view('pages.sReview', compact('users', 'songs', 'sreview'));        
    }


    public function AddSReview(Request $request)
    {
    	$user = $request->sUser;
    	$song = $request->sTitle;
    	$review = $request->sReview;
    	DB::select('insert into song_reviews (user_id, song_id, review) values ('.$user.','.$song.',"'.$review.'")');
        return redirect("/sReview");

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
