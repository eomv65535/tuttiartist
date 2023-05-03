<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return inertia('Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son válidas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // Buscar el usuario en la base de datos
        $existingUser = User::where('email', $user->email)->first();

        // Si el usuario no existe, crearlo
        if (!$existingUser) {
            $newUser = new User([
                'name' => $user->name,
                'email' => $user->email,
                'password' => bcrypt(str_random(16)), // Generar una contraseña aleatoria
            ]);
            $newUser->save();
            $existingUser = $newUser;
        }

        // Autenticar al usuario en Laravel
        Auth::login($existingUser, true);

        // Redirigir a la página de inicio
        return Inertia::location('/home');
    }

     /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Buscar el usuario en la base de datos
        $existingUser = User::where('email', $user->email)->first();

        // Si el usuario no existe, crearlo
        if (!$existingUser) {
            $newUser = new User([
                'name' => $user->name,
                'email' => $user->email,
                'password' => bcrypt(str_random(16)), // Generar una contraseña aleatoria
            ]);
            $newUser->save();
            $existingUser = $newUser;
        }

        // Autenticar al usuario en Laravel
        Auth::login($existingUser, true);

        // Redirigir a la página de inicio
        return Inertia::location('/home');
    }
}
