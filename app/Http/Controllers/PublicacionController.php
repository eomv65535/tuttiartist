<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class PublicacionController extends Controller
{
    public function index()
    {
        return Inertia::render('Publicaciones/Index');
    }

    public function obtenerPublicaciones()
    {
        // Obtener todas las publicaciones desde el modelo

        $publicaciones = Publicacion::with('users')
            ->with([
                'comentarios' => function ($query) {
                    $query->with('users')->orderByDesc('created_at');
                },
            ])
            ->orderByDesc('created_at')
            ->get();
        // Retornar las publicaciones en formato JSON
        return response()->json($publicaciones);
    }

    public function store(Request $request): Response
    {
        // Valida los datos del formulario
        $request->validate([
            'contenido' => 'required|string',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Valida las imágenes
        ]);

        // Crea una nueva instancia de Publicacion con los datos del formulario
        $publicacion = new Publicacion();
        $publicacion->contenido = $request->input('contenido');
        $publicacion->usuario_id = Auth::id(); // Asigna el ID del usuario autenticado como autor de la publicación

        // Sube las imágenes y guarda los nombres en la base de datos
        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');
            $imagenesNombres = [];

            foreach ($imagenes as $imagen) {
                $nombre = time() . '_' . $imagen->getClientOriginalName();
                $ruta = $imagen->storeAs('public/imagenes', $nombre);
                $imagenesNombres[] = $nombre;
            }

            $publicacion->imagenes = json_encode($imagenesNombres);
        }

        $publicacion->save(); // Guarda la publicación en la base de datos

        // Renderiza la vista de Inertia.js para la página de inicio
        return Inertia::render('Publicaciones/Index', [
            'publicaciones' => Publicacion::with('comentarios')->get(),
        ]);
    }

    public function show($id)
    {
        $publicacion = Publicacion::with('comentarios')->find($id); // Obtener una publicación específica con sus comentarios

        return Inertia::render('Publicaciones/Show', [
            'publicacion' => $publicacion,
        ]);
    }

    public function darMeGusta($id)
    {
        $publicacion = Publicacion::find($id); // Obtener la publicación por su ID

        // Incrementar el contador de Me Gusta
        $publicacion->increment('me_gusta');

        return response()->json([
            'message' => 'Me gusta actualizado correctamente',
        ]);
    }

    public function quitarMeGusta($id)
    {
        $publicacion = Publicacion::find($id); // Obtener la publicación por su ID

        // Decrementar el contador de Me Gusta
        $publicacion->decrement('me_gusta');

        return response()->json([
            'message' => 'Me gusta actualizado correctamente',
        ]);
    }
}
