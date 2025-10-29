<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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

        try {
            $validated = $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^[\pL\s]+$/u', // hanya huruf & spasi
                ],
                'display_name' => [
                    'nullable',
                    'string',
                    'max:15',
                    'regex:/^[\pL\s]+$/u', // hanya huruf & spasi
                ],
                'username' => [
                    'required',
                    'string',
                    'max:50',
                    'regex:/^[A-Za-z0-9_]+$/', // huruf, angka, underscore
                    Rule::unique('users', 'username')->ignore($user->id),
                ],
                'nis' => 'nullable|string|max:4|unique:users,nis,' . $user->id,
                'nisn' => 'nullable|string|max:20|unique:users,nisn,' . $user->id,
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore($user->id),
                ],
                'birth_place' => 'nullable|string|max:255',
                'birth_date' => 'nullable|date',
                'religion' => 'nullable|string|max:100',
                'gender' => ['nullable', Rule::in(['Laki-laki', 'Perempuan'])],
                'phone' => 'nullable|string|max:15',
                'address' => 'nullable|string',
                'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ], [
                'username.regex' => 'Username hanya boleh mengandung huruf, angka, dan underscore (_), tanpa spasi.',
                'name.regex' => 'Nama lengkap hanya boleh berisi huruf dan spasi.',
                'display_name.regex' => 'Display name hanya boleh berisi huruf dan spasi.',
            ]);

            $user->fill($validated);

            // Handle upload foto profil
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
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Symfony\Component\HttpKernel\Exception\HttpException $e) {
            if ($e->getStatusCode() === 413) {
                return back()->withErrors(['profile_photo' => 'Ukuran file terlalu besar! Maksimal 2MB.'])->withInput();
            }
            throw $e;
        } catch (\Exception $e) {
            return back()->withErrors(['profile_photo' => 'Terjadi kesalahan saat mengunggah file.'])->withInput();
        }
    }
}
