<?php

namespace App\Http\Controllers;

use App\Models\Musics;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Musics::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $music = Musics::create($request->all());
        if ($music) {
            return $music;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Musics $music)
    {
        return $music;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Musics $music)
    {
        
        if ($music->update($request->all())) {
            return response()->json([
                'success' => 'Musique modifié avec succès'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Musics $music)
    {
        $music->delete();
    }
}
