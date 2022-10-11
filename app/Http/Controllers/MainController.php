<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request)
    {
        DB::enableQueryLog();
        $query = Movie::query()
            ->with(['user', 'genres'])
            ->latest();

        if ($request->has('genres')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->whereIn('genres.id', $request->get('genres'));
            });
        }

        if ($request->has('actors')) {
            $query->whereHas('actors', function ($q) use ($request) {
                $q->whereIn('actors.id', $request->get('actors'));
            });
        }

        if ($request->has('title_movie')) {
            $search = '%' . $request->get('title_movie') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('title_movie', 'like', $search);
            });
        }

        if ($request->has('year')) {
            $search = '%' . $request->get('year') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('year', 'like', $search);
            });
        }

        $movies = $query
            ->paginate(10)
            ->appends($request->query());

        $genres = Genre::all();
        $actors = Actor::all();

        return view('home', compact('movies', 'genres', 'actors'));
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function about()
    {
        return view('about');
    }

    public function form()
    {
        return view('form');
    }
}
