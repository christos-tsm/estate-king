<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        return view('auth.user-profile')->with('user', auth()->user());
    }


    public function update(Request $request)
    {
        $user = auth()->user();

        $form_fields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required'
        ]);



        if ($request->hasFile('avatar_url')) {

            $form_fields['avatar_url'] = $request->file('avatar_url')->store('avatars', 'public');

            if ($user->avatar_url) {
                Storage::disk('public')->delete($user->avatar_url);
            }
        }

        $user->update($form_fields);

        session()->flash('success', 'User updated');

        return redirect()->back();
    }
}
