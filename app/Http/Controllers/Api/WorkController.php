<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    // INDEX
    public function index(Request $request)
    {
        $search = $request->input('search'); // recupera il parametro search della richiesta

        $works = Work::with('painter') // recupera tutte le opere con i pittori associati
            ->when($search, function ($query, $search) { // se c'è search, applica il filtro
                $search = strtolower($search);
                $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]) // usa whereRaw per applicare il filtro direttamente su SQL, con LIKE e LOWER
                    ->orWhereHas('painter', function ($q) use ($search) {   // se esiste un pittore associato all'opera, filtra anche in base al nome del pittore
                        $q->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]); // case sensitive
                    });
            })
            ->get();

        return response()->json([
            'success' => true,
            'data' => $works,
        ]);
    }

    // SHOW
    public function show(Work $work)
    {
        $work->load('painter');  // load carica le relazioni di un modello dopo che è stato recuperato dal db e aggiunge all'istanza work
        return response()->json([
            'success' => true,
            'data' => $work
        ]);
    }
}
