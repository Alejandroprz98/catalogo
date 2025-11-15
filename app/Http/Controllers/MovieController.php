<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    // Devuelve todas las películas
    public function index()
    {
        $movies = Movie::all();
        return response()->json($movies);
    }

    // Devuelve una película por ID
    public function show($id)
    {
        $movie = Movie::find($id);
        if (!$movie) {
            return response()->json(['message' => 'Película no encontrada'], 404);
        }
        return response()->json($movie);
    }

    // Inserta una nueva película
    public function store(Request $request)
    {
        $movie = Movie::create($request->all());
        return response()->json($movie, 201);
    }

    // Actualizar una película existente
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Película no encontrada'], 404);
        }

        $movie->update($request->all());
        return response()->json($movie);
    }

    // Eliminar una película
    public function destroy($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['message' => 'Película no encontrada'], 404);
        }

        $movie->delete();
        return response()->json(['message' => 'Película eliminada correctamente']);
    }
    
}
