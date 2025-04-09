<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    public function index() {
        $works = Work::with('painter')->get();
        return response()->json([
            'success' => true,
            'data' => $works
        ]);
    }

    public function show(Work $work) {
        $work->load('painter');  // load carica le relazioni di un modello dopo che è stato recuperato dal db e aggiunge all'istanza work
        return response()->json([
            'success' => true,
            'data' => $work
        ]);
    }
}
