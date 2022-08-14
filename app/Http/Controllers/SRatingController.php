<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function ViewSRating()
    {   
        $users = DB::select('select * from users');
        $songs = DB::select('select * from songs');
        $srating = DB::select('SELECT sr.id, u.name, s.title, sr.rating FROM s_ratings sr JOIN users u on sr.user_id = u.id JOIN songs s on sr.song_id = s.id; ');
        return view('pages.sRating', compact('users', 'songs', 'srating'));
    }

    public function AddSRating(Request $request)
    {
    	$user = $request->sUser;
    	$song = $request->sTitle;
    	$rating = $request->sRating;
    	DB::select('insert into s_ratings (user_id, song_id, rating) values ('.$user.','.$song.',"'.$rating.'")');
        return redirect("/sRating");
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
