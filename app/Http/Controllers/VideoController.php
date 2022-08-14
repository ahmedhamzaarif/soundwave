<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = DB::select('SELECT v.id, v.title, v.description, v.image, v.file, v.year, g.genre_name, ar.artist_name, al.album_name, l.language_name FROM videos v left join genres g on v.genre_id = g.id left join artists ar on v.artist_id = ar.id left join albums al on v.album_id = al.id left join languages l on v.lang_id = l.id order by v.id');

        $genre = DB::select('select * from genres');
        $artist = DB::select('select * from artists');
        $album = DB::select('select * from albums');
        $lang = DB::select('select * from languages');
        return view('pages.viewVideos', compact('genre', 'artist', 'album', 'lang', 'videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = DB::select('select * from genres');
        $artist = DB::select('select * from artists');
        $album = DB::select('select * from albums');
        $lang = DB::select('select * from languages');
        return view('pages.addVideos', compact('genre', 'artist', 'album', 'lang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->video_title;
        $desc = $request->video_desc;
        $genre = $request->video_genre;
        $artist = $request->video_artist;
        $album = $request->video_album;
        $lang = $request->video_lang;
        $year = $request->video_year;
        $video = $request->video_link;

        $image = $request->video_image;
        $imagesname = time().'.'.$image->getClientOriginalExtension();
        $request->video_image->move('videoImages', $imagesname);

        DB::select('insert into videos (title, description, year, genre_id, artist_id, album_id, lang_id, image, file) values("'.$title.'","'.$desc.'",'.$year.','.$genre.','.$artist.','.$album.','.$lang.',"'.$imagesname.'","'.$video.'")');

        $genre = DB::select('select * from genres');
        $artist = DB::select('select * from artists');
        $album = DB::select('select * from albums');
        $lang = DB::select('select * from languages');
        return view('pages.addvideos', compact('genre', 'artist', 'album', 'lang'));
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
