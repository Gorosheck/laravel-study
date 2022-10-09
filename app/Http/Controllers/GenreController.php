<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\CreateRequest;
use App\Http\Requests\Genre\EditRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function createGenre()
    {
        return view('genres.create');
    }

    public function editGenre(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $genre = new Genre($data);
        $genre->save();

        session()->flash('success', 'Genre create successfully!');
        return redirect()->route('genres.list', ['genre' => $genre->id]);
    }

    public function edit(Genre $genre, EditRequest $request)
    {
        $data = $request->validated();
        $genre->fill($data);
        $genre->save();

        session()->flash('success', 'Genre edited successfully!');
        return redirect()->route('genres.list', ['genre' => $genre->id]);
    }

    public function list(Request $request)
    {
        $genres = Genre::query()->paginate(20);
        return view('genres.list', ['genres' => $genres]);
    }

    public function show(Genre $genre)
    {
        return view('genres.show', compact('genre'));
    }

    public function delete(Genre $genre)
    {
        $genre->delete();

        session()->flash('success', 'Genre deleted successfully!');
        return redirect()->route('genres.list');
    }

}

