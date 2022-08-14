<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use  App\Models\Genre;
use  App\Models\Artist;
use  App\Models\Album;
use  App\Models\Language;
use  App\Models\User;
use  App\Models\Song;
use  App\Models\Video;
use  App\Models\sRating;
use  App\Models\SongReviews;
use  App\Models\vRating;
use  App\Models\video_review;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $role = Auth::user()->role;
        $genre_total = Genre::get()->count();
        $artists_total = Artist::get()->count();
        $album_total = Album::get()->count();
        $language_total = Language::get()->count();
        $user_total = User::get()->count();
        $songs_total = Song::get()->count();
        $srating_total = sRating::get()->count();
        $sreview_total = SongReviews::get()->count();
        $videos_total = Video::get()->count();
        $vrating_total = vRating::get()->count();
        $vreview_total = video_review::get()->count();

        if($role == "admin"){
            return view('pages.dashboard',[
                'genre_total' =>$genre_total,
                'artists_total' =>$artists_total,
                'album_total' =>$album_total,
                'language_total' =>$language_total,
                'user_total' =>$user_total,
                'songs_total' =>$songs_total,
                'srating_total' =>$srating_total,
                'sreview_total' =>$sreview_total,
                'videos_total' =>$videos_total,
                'vrating_total' =>$vrating_total,
                'vreview_total' =>$vreview_total,
            ]);
        }
        // else if($role == "user"){
        //     return view('pages.homePage');
        // }
        else{
            return view('auth.login');
        }
    }
    
    public function home()
    {
        $songs = DB::select('SELECT s.id, s.title, s.description, s.image, s.file, s.year, g.genre_name, ar.artist_name, al.album_name, l.language_name FROM songs s left join genres g on s.genre_id = g.id left join artists ar on s.artist_id = ar.id left join albums al on s.album_id = al.id left join languages l on s.lang_id = l.id ORDER by s.id DESC LIMIT 3;');
        $videos = DB::select('SELECT v.id, v.title, v.description, v.image, v.file, v.year, g.genre_name, ar.artist_name, al.album_name, l.language_name FROM videos v left join genres g on v.genre_id = g.id left join artists ar on v.artist_id = ar.id left join albums al on v.album_id = al.id left join languages l on v.lang_id = l.id ORDER by v.id DESC LIMIT 3;');
     
        return view('pages.homePage',  compact('songs', 'videos'));
    
    }

    public function songs()
    {
        $songs = DB::select('SELECT s.id, s.title, s.description, s.image, s.file, s.year, g.genre_name, ar.artist_name, al.album_name, l.language_name FROM songs s left join genres g on s.genre_id = g.id left join artists ar on s.artist_id = ar.id left join albums al on s.album_id = al.id left join languages l on s.lang_id = l.id ORDER by s.id DESC;');

        return view('pages.songsHome',  compact('songs'));
    }

    public function videos()
    {
        $videos = DB::select('SELECT v.id, v.title, v.description, v.image, v.file, v.year, g.genre_name, ar.artist_name, al.album_name, l.language_name FROM videos v left join genres g on v.genre_id = g.id left join artists ar on v.artist_id = ar.id left join albums al on v.album_id = al.id left join languages l on v.lang_id = l.id ORDER by v.id DESC;');
        return view('pages.videosHome',  compact('videos'));
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
