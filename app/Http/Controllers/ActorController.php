<?php

namespace App\Http\Controllers;

use App\Http\Requests\Actor\CreateRequest;
use App\Http\Requests\Actor\EditRequest;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function createActor()
    {
        return view('actors.create');
    }

    public function editActor(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $actor = new Actor($data);
        $actor->save();
        session()->flash('success', 'Actor create successfully!');
        return redirect()->route('actors.list', ['actor' => $actor->id]);
    }

    public function edit(Actor $actor, EditRequest $request)
    {
        $data = $request->validated();
        $actor->fill($data);
        $actor->save();
        session()->flash('success', 'Actor edited successfully!');
        return redirect()->route('actors.list', ['actor' => $actor->id]);
    }

    public function list(Request $request)
    {
        $actors = Actor::query()->paginate(20);
        return view('actors.list', ['actors' => $actors]);
    }

    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }

    public function delete(Actor $actor)
    {
        $actor->delete();
        session()->flash('success', 'Actor deleted successfully!');
        return redirect()->route('actors.list');
    }
}
