<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    // Método para guardar un nuevo comentario
    public function store(Request $request)
    {

        $publicacionId = $request->input('publicacion_id');
                 Comentario::create([
                'publicacion_id' => $request->input('publicacion_id'),
                'user_id' => Auth::user()->id,
                'contenido' => $request->input('contenido'),
            ]);
       $comentarios = Comentario::where('publicacion_id', $publicacionId)->get();
       return response()->json(['datos' => $comentarios]);
    }

}
