<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\CreateRequest;
use App\Http\Requests\Movie\EditRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function createForm()
    {
        return view('movies.create');
    }

    public function editForm(Movie $movie)
    {

        return view('movies.edit', compact('movie'));
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $movie = new Movie($data);
        $movie->save();

        session()->flash('success', 'Success!');

        return redirect()->route('movie.show', compact('movie'));
    }

    public function edit(Movie $movie, EditRequest $request)
    {
        $data = $request->validated();
        $movie->fill($data);
        $movie->save();

        session()->flash('success', 'Success!');

        return redirect()->route('movie.show', compact('movie'));
    }

    public function list(Request $request)
    {
        $movies = Movie::all();

        return view('movies.list', compact('movies'));
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function delete(Movie $movie)
    {
        $movie->delete();

        session()->flash('success', 'Deleted successfully!');
        return redirect()->route('movie.list');
    }
}
