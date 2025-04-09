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
}
