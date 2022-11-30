<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ParaindexController extends Controller
{
    public function index()
    {
        $invitado = false;
        if (Auth::guest())
            $invitado = true;

      

        return Inertia::render('Inicio', [      
            'invitados' => $invitado
        ]);
    }
}
