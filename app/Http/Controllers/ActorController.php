<?php

namespace App\Http\Controllers;

use App\Http\Requests\Actor\CreateRequest;
use App\Http\Requests\Actor\EditRequest;
use App\Models\Actor;
use App\Services\ActorService;
use Illuminate\Http\Request;

class ActorController extends Controller
{

    public function __construct(private ActorService $actorService)
    {
    }

    public function createForm()
    {
        return view('actors.create');
    }

    public function editForm(Actor $actor)
    {
        //$actor = Actor::query()->findOrFail($id);
        return view('actors.edit', compact('actor'));
    }

    public function delete(Actor $actor)
    {
       // $actor = Actor::query()->findOrFail($id)->delete();
        $actor->delete();
        return redirect()->route('actor.list');
    }


    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $actor = new Actor($data);
        $actor->save();

        session()->flash('success', 'Success!');
        return redirect()->route('actor.show', ['actor' => $actor->id]);
    }

    public function edit(Actor $actor, EditRequest $request)
    {
        //$actor = Actor::query()->findOrFail($id);
        $data = $request->validated();
        $actor->fill($data);
        $actor->save();

        session()->flash('success', 'Success!');
        return redirect()->route('actor.show', ['actor' => $actor->id]);
    }


    public function list()
    {
        $actors = Actor::paginate(5);

        return view('actors.list', ['actors' => $actors]);
    }

    public function show(Actor $actor)
    {
        //$actor = Actor::query()->findOrFail($id);

        return view('actors.show', compact('actor'));
    }
}
