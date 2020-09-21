<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = $this->validateRequest(request(), $user);

        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->storeAs('avatars', $attributes['avatar']->getClientOriginalName(), 'public');
        }
        
        $user->update($attributes);
        
        return redirect()->back()->with('success', 'Profile Updated!');
    }

    private function validateRequest($request, User $user)
    {
        return $request->validate([
            'username' => ['string', 'required', Rule::unique('users')->ignore($user)],
            'name' => ['string', 'required'],
            'email' => ['string', 'required', 'email', Rule::unique('users')->ignore($user)],
            'password' => ['required', 'confirmed', 'string'],
            'avatar' => ['sometimes', 'required', 'image', 'mimes:jpg,svg,jpeg,png']
        ]);
    }
}
