<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }


    public function editProfile()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nis' => 'nullable|string|max:4|unique:users,nis,' . $user->id,
            'nisn' => 'nullable|string|max:20|unique:users,nisn,' . $user->id,
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'birth_place' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'religion' => 'nullable|string|max:100',
            'gender' => ['nullable', Rule::in(['Laki-laki', 'Perempuan'])],
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $user->fill($validated);
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete('profile_photos/' . $user->profile_photo);
            }

            $filename = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->storeAs('profile_photos', $filename, 'public');

            $user->profile_photo = $filename;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
