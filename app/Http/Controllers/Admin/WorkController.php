<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Painter;
use Illuminate\Support\Facades\Storage;

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
        $painters = Painter::all();
        return view('works.create', compact('painters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // controllo se è stato aggiunto un nuovo pittore
        if ($request->painter_id === 'new') {
            $painter = new Painter();
            $painter->name = $request->new_painter;
            $painter->description = $request->new_painter_description;
            $painter->save();

            $painter_id = $painter->id; // ottengo l'id del nuovo pittore
        } else {
            $painter_id = $request->painter_id; // oppure uso l'id del pittore selezionato
        }

        $newWork = new Work();
        $newWork->name = $data['name'];
        $newWork->painter_id = $painter_id;
        $newWork->year = $data['year'];
        $newWork->location = $data['location'];
        $newWork->description = $data['description'];

        if (array_key_exists('image', $data)) { // verifica se la chiave image esiste nell'array data
            $img_url = Storage::putFile('works', $data['image']); //putFile crea nome img univoco
            $newWork->image = $img_url;
        }

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
        $painters = Painter::all();
        return view('works.edit', compact('work', 'painters'));  //work è una stringa
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Work $work)
    {
        $data = $request->all();
        $work->name = $data['name'];
        $work->painter_id = $data['painter_id'];
        $work->year = $data['year'];
        $work->location = $data['location'];
        $work->description = $data['description'];

        // controllo se è stata caricata una nuova immagine
        if ($request->hasFile('image')) {
            // elimina l'immagine precedente solo se esiste
            if ($work->image) {
                Storage::delete($work->image);
            }

            // salva la nuova immagine
            $img_url = $request->file('image')->store('works', 'public');
            $work->image = $img_url;
        }

        $work->update();

        return redirect()->route('works.show', $work);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        if ($work->image) {
            Storage::delete($work->image);
        }
        ;

        $work->delete();
        return redirect()->route('works.index');
    }
}
