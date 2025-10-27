<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('profile.index', [
            'user' => $user
        ]);
    }

    public function editProfile()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {

        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'nullable|string|max:20|unique:users,nis,' . $user->id,
            'nisn' => 'nullable|string|max:20|unique:users,nisn,' . $user->id,
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'birth_place' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'religion' => 'nullable|string|max:100',
            'gender' => ['nullable', Rule::in(['Laki-laki', 'Perempuan'])],
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // Handle photo upload
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');

            $filename = 'profile_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/profile_photos', $filename);

            if ($user->profile_photo && Storage::exists('public/profile_photos/' . $user->profile_photo)) {
                Storage::delete('public/profile_photos/' . $user->profile_photo);
            }

            $validated['profile_photo'] = $filename;
        } else {
            unset($validated['profile_photo']);
        }

        // Update user
        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
