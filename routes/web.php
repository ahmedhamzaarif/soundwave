<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\sReviewController;
use App\Http\Controllers\vReviewController;
use App\Http\Controllers\sRatingController;
use App\Http\Controllers\vRatingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', function () {
    return view('pages.homePage');
});
Route::get('/', [HomeController::class, 'home']);

Route::get('/viewSongs', function () {
    return view('pages.songsHome');
});
Route::get('/viewSongs', [HomeController::class, 'songs']);

Route::get('/viewVideos', function () {
    return view('pages.songsHome');
});
Route::get('/viewVideos', [HomeController::class, 'videos']);


Route::resource('/redirects', HomeController::class);

Route::get('/genre', [AdminController::class, 'ViewGenre']);
Route::post('/addgenre', [AdminController::class, 'AddGenre']);
Route::get('/getGenre/{id}', function($id){
    $genre = DB::select('select id, genre_name from genres where id ='.$id);
    return $genre;
});
Route::post('updGenre/{id}/{name}', function($id, $name){
    $upd = DB::select('update genres set genre_name = "'.$name.'" where id ='.$id);
    return $upd;
});
Route::get('delGenre/{id}', function($id){
    DB::select('delete from genres where id='.$id);
    
    $genre = DB::select('select * from genres');
    return $genre;
});


Route::get('/artist', [ArtistController::class, 'ViewArtist']);
Route::post('/addartist', [ArtistController::class, 'AddArtist']);
Route::get('/getArtist/{id}', function($id){
    $artist = DB::select('select id, artist_name from artists where id ='.$id);
    return $artist;
});
Route::post('updArtist/{id}/{name}', function($id, $name){
    $upd = DB::select('update artists set artist_name = "'.$name.'" where id ='.$id);
    return $upd;
});
Route::get('delArtist/{id}', function($id){
    DB::select('delete from artists where id='.$id);
    
    $artist = DB::select('select * from artists');
    return $artist;
});


Route::get('/album', [AlbumController::class, 'ViewAlbum']);
Route::post('/addalbum', [AlbumController::class, 'AddAlbum']);
Route::get('/getAlbum/{id}', function($id){
    $album = DB::select('select id, album_name from albums where id ='.$id);
    return $album;
});
Route::post('updAlbum/{id}/{name}', function($id, $name){
    $upd = DB::select('update albums set album_name = "'.$name.'" where id ='.$id);
    return $upd;
});
Route::get('delAlbum/{id}', function($id){
    DB::select('delete from albums where id='.$id);
    
    $album = DB::select('select * from albums');
    return $album;
});

Route::get('/language', [LanguageController::class, 'ViewLanguage']);
Route::post('/addlang', [LanguageController::class, 'AddLanguage']);
Route::get('/getLang/{id}', function($id){
    $lang = DB::select('select id, language_name from languages where id ='.$id);
    return $lang;
});
Route::post('updLang/{id}/{name}', function($id, $name){
    $upd = DB::select('update languages set language_name = "'.$name.'" where id ='.$id);
    return $upd;
});
Route::get('delLang/{id}', function($id){
    DB::select('delete from languages where id='.$id);
    
    $lang = DB::select('select * from languages');
    return $lang;
});

Route::get('/users', [UserController::class, 'ViewUser']);
Route::post('/adduser', [UserController::class, 'AddUser']);
Route::get('/getUser/{id}', function($id){
    $user = DB::select('select id, name, phone, address, email from users where id ='.$id);
    return $user;
});
Route::post('updUser/{id}/{name}/{phone}/{address}/{email}', function($id, $name, $phone, $address, $email){
    $upd = DB::select('update users set name="'.$name.'", phone='.$phone.', address="'.$address.'", email="'.$email.'" where id ='.$id);
    return $upd;
});
Route::get('delUser/{id}', function($id){
    DB::select('delete from users where id='.$id);
    
    $user = DB::select('select * from users');
    return $user;
});

Route::resource('/manageSongs', SongController::class);
Route::get('/getSong/{id}', function($id){
    $song = DB::select('select * from songs where id ='.$id);
    return $song;
});

Route::post('updSong/{id}/{title}/{desc}/{genre}/{artist}/{album}/{lang}/{year}', function($id, $title, $desc, $genre, $artist, $album, $lang, $year){
    $upd = DB::select('update songs set title= "'.$title.'" where id ='.$id);
    return $upd;
});
Route::get('delSong/{id}', function($id){
    DB::select('delete from songs where id='.$id);
    
    $song = DB::select('SELECT s.id, s.title, s.description, s.image, s.file, s.year, g.genre_name, ar.artist_name, al.album_name, l.language_name FROM songs s left join genres g on s.genre_id = g.id left join artists ar on s.artist_id = ar.id left join albums al on s.album_id = al.id left join languages l on s.lang_id = l.id order by s.id');
    return $song;
});

Route::resource('/manageVideos', VideoController::class);
Route::get('/getVid/{id}', function($id){
    $vid = DB::select('select * from videos where id ='.$id);
    return $vid;
});

Route::post('updVid/{id}/{name}/{desc}/{genre}/{artist}/{album}/{lang}/{year}/{url}', function($id, $name, $desc, $genre, $artist, $album, $lang, $year, $url){
    $upd = DB::select('update videos set title="'.$name.'", description="'.$desc.'", genre_id='.$genre.', artist_id='.$artist.', album_id= '.$album.', lang_id= '.$lang.', year='.$year.', file="'.$url.'" where id ='.$id);
    return $upd;
});
Route::get('delVid/{id}', function($id){
    DB::select('delete from videos where id='.$id);
    
    $vid = DB::select('SELECT v.id, v.title, v.description, v.image, v.file, v.year, g.genre_name, ar.artist_name, al.album_name, l.language_name FROM videos v left join genres g on v.genre_id = g.id left join artists ar on v.artist_id = ar.id left join albums al on v.album_id = al.id left join languages l on v.lang_id = l.id order by v.id');
    return $vid;
});

Route::get('/sReview', [sReviewController::class, 'ViewSReview']);
Route::post('/addsreview', [sReviewController::class, 'AddSReview']);
Route::get('/getSReview/{id}', function($id){
    $sreview = DB::select('SELECT * FROM song_reviews;');
    return $sreview;
});
Route::post('updSReview/{id}/{user}/{song}/{review}', function($id, $user, $song, $review){
    $upd = DB::select('update song_reviews set user_id='.$user.', song_id='.$song.', review="'.$review.'" where id ='.$id);
    return $upd;
});
Route::get('delSReview/{id}', function($id){
    DB::select('delete from song_reviews where id='.$id);
    
    $sreview = DB::select('SELECT sr.id, u.name, s.title, sr.review FROM song_reviews sr JOIN users u on sr.user_id = u.id JOIN songs s on sr.song_id = s.id;');
    return $sreview;
});

Route::get('/vReview', [vReviewController::class, 'ViewVReview']);
Route::post('/addvreview', [vReviewController::class, 'AddVReview']);
Route::get('/getVReview/{id}', function($id){
    $vreview = DB::select('SELECT * FROM video_reviews;');
    return $vreview;
});
Route::post('updvReview/{id}/{user}/{video}/{review}', function($id, $user, $video, $review){
    $upd = DB::select('update video_reviews set user_id='.$user.', video_id='.$video.', review="'.$review.'" where id ='.$id);
    return $upd;
});
Route::get('delVReview/{id}', function($id){
    DB::select('delete from video_reviews where id='.$id);
    
    $sreview = DB::select('SELECT vr.id, u.name, v.title, vr.review FROM video_reviews vr JOIN users u on vr.user_id = u.id JOIN videos v on vr.video_id = v.id;');
    return $sreview;
});

Route::get('/sRating', [sRatingController::class, 'ViewSRating']);
Route::post('/addsrating', [sRatingController::class, 'AddSRating']);
Route::get('/getSRating/{id}', function($id){
    $srate = DB::select('SELECT * FROM s_ratings;');
    return $srate;
});
Route::post('updSRating/{id}/{user}/{song}/{rating}', function($id, $user, $song, $rating){
    $upd = DB::select('update s_ratings set user_id='.$user.', song_id='.$song.', rating='.$rating.' where id ='.$id);
    return $upd;
});
Route::get('delSRating/{id}', function($id){
    DB::select('delete from s_ratings where id='.$id);
    
    $srate = DB::select('SELECT sr.id, u.name, s.title, sr.rating FROM s_ratings sr JOIN users u on sr.user_id = u.id JOIN songs s on sr.song_id = s.id;');
    return $srate;
});

Route::get('/vRating', [vRatingController::class, 'ViewVRating']);
Route::post('/addvrating', [vRatingController::class, 'AddVRating']);
Route::get('/getVRating/{id}', function($id){
    $vrate = DB::select('SELECT * FROM v_ratings;');
    return $vrate;
});
Route::post('updVRating/{id}/{user}/{video}/{rating}', function($id, $user, $video, $rating){
    $upd = DB::select('update v_ratings set user_id='.$user.', video_id='.$video.', rating='.$rating.' where id ='.$id);
    return $upd;
});
Route::get('delVRating/{id}', function($id){
    DB::select('delete from v_ratings where id='.$id);
    
    $vrate = DB::select('SELECT vr.id, u.name, v.title, vr.rating FROM v_ratings vr JOIN users u on vr.user_id = u.id JOIN videos v on vr.video_id = v.id;');
    return $vrate;
});
// Route::get('myadmin', function(){
//     return view('pages.dashboard');
//     });