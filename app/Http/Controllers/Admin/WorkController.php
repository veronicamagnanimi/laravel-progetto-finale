<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::all();
        return view('works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('works.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newWork = new Work();
        $newWork->name = $data['name'];
        $newWork->painter = $data['painter'];
        $newWork->year = $data['year'];
        $newWork->location = $data['location'];
        $newWork->description = $data['description'];

        $newWork->save();

        return redirect()->route('works.show', $newWork);
    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work)
    {
        return view('works.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work)
    {
        return view('works.edit', compact('work'));  //work è una stringa
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Work $work)
    {
        $data = $request->all();
        $work->name = $data['name'];
        $work->painter = $data['painter'];
        $work->year = $data['year'];
        $work->location = $data['location'];
        $work->description = $data['description'];

        $work->update();

        return redirect()->route('works.show', $work);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->route('works.index');
    }
}
