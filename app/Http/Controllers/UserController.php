<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getAuthenticatedUser()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'ruta_img' => $user->foto,
                'slug' => $user->slug,
            ]);
        } else {
            return response()->json([
                'error' => 'Unauthenticated',
            ]);
        }
    }

    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' =>
                'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $image = $request->file('profile_photo');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = 'storage/profile-photos/' . $filename;
        $img = Image::make($image->getRealPath());
        $img
            ->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($path);

        $user->foto = $path;
        $user->save();

        return back()->with('success', 'You have successfully upload image.');
    }


}
