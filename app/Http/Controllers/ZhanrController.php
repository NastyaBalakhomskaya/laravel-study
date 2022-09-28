<?php

namespace App\Http\Controllers;

use App\Http\Requests\Zhanr\CreateRequest;
use App\Http\Requests\Zhanr\EditRequest;
use App\Models\Zhanr;
use Illuminate\Http\Request;

class ZhanrController extends Controller
{

    public function createForm()
    {
        return view('zhanrs.create');
    }

    public function editForm(int $id)
    {
        $zhanr = Zhanr::query()->findOrFail($id);
        return view('zhanrs.edit', compact('zhanr'));
    }

    public function delete(int $id)
    {
        $zhanr = Zhanr::query()->findOrFail($id)->delete();
        return redirect()->route('zhanr.list');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $zhanr = new Zhanr($data);
        $zhanr->save();

        session()->flash('success', 'Success!');
        return redirect()->route('zhanr.show', ['id' => $zhanr->id]);
    }

    public function edit(int $id, EditRequest $request)
    {
        $zhanr = Zhanr::query()->findOrFail($id);
        $data = $request->validated();
        $zhanr->fill($data);
        $zhanr->save();

        session()->flash('success', 'Success!');
        return redirect()->route('zhanr.show', ['id' => $zhanr->id]);
    }

    public function list()
    {
        $zhanrs = Zhanr::paginate(5);

        return view('zhanrs.list', ['zhanrs' => $zhanrs]);
    }

    public function show(int $id)
    {
        $zhanr = Zhanr::query()->findOrFail($id);

        return view('zhanrs.show', compact('zhanr'));
    }

}
