<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MovieController extends Controller
{
    public function index() {
        $user = json_decode(Cookie::get('user'), true);
        $movies = Movie::orderBy('created_at', 'desc')->get();
        return view('admin.movies.list', compact(['user', 'movies']));
    }

    public function create() {
        $user = json_decode(Cookie::get('user'), true);
        return view('admin.movies.add', compact(['user']));
    }

    public function handleCreate(Request $request) {
        $id_movie = time()."";
        $title = $request->title;
        $genres = $request->genres;
        $over_view = $request->overView;
        $poster_path = $request->posterPath;
        $backdrop_path = $request->backdropPath;
        $video_path = $request->videoPath;
        $vote_count = 0;
        $vote_average = 0;
        $country = $request->country;
        $runtime = $request->runtime;
        $release_date = $request->releaseDate;
        $status = $request->status;

        Movie::create([
            'id_movie' => $id_movie,
            'title' => $title,
            'genres' => $genres,
            'over_view' => $over_view,
            'poster_path' => $poster_path,
            'backdrop_path' => $backdrop_path,
            'video_path' => $video_path,
            'vote_count' => $vote_count,
            'vote_average' => $vote_average,
            'country' => $country,
            'runtime' => $runtime,
            'release_date' => $release_date,
            'status' => $status
        ]);
    }

    public function update(Movie $movie) {
        return $movie;
    }

    public function handleUpdate() {
        dd('ok');
    }

    public function delete($id) {
        $movie = Movie::where('id_movie', $id)->delete();
    }
}
