<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $genre = DB::select('select * from genres');
        $artist = DB::select('select * from artists');
        $album = DB::select('select * from albums');
        $lang = DB::select('select * from languages');
        $songs = DB::select('SELECT s.id, s.title, s.description, s.image, s.file, s.year, g.genre_name, ar.artist_name, al.album_name, l.language_name FROM songs s left join genres g on s.genre_id = g.id left join artists ar on s.artist_id = ar.id left join albums al on s.album_id = al.id left join languages l on s.lang_id = l.id order by s.id');
        return view('pages.viewSongs',  compact('genre', 'artist', 'album', 'lang', 'songs'));
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
        return view('pages.addSongs', compact('genre', 'artist', 'album', 'lang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->song_title;
        $desc = $request->song_desc;
        $genre = $request->song_genre;
        $artist = $request->song_artist;
        $album = $request->song_album;
        $lang = $request->song_lang;
        $year = $request->song_year;

        $image = $request->song_image;
        $imagesname = time().'.'.$image->getClientOriginalExtension();
        $request->song_image->move('songImages', $imagesname);

        $file = $request->song_file;
        $filesname = time().'.'.$file->getClientOriginalExtension();
        $request->song_file->move('songs', $filesname);

        DB::select('insert into songs (title, description, year, genre_id, artist_id, album_id, lang_id, image, file) values("'.$title.'","'.$desc.'",'.$year.','.$genre.','.$artist.','.$album.','.$lang.',"'.$imagesname.'","'.$filesname.'")');

        $genre = DB::select('select * from genres');
        $artist = DB::select('select * from artists');
        $album = DB::select('select * from albums');
        $lang = DB::select('select * from languages');
        return view('pages.addSongs', compact('genre', 'artist', 'album', 'lang'));
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
