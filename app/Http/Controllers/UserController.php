<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();

        return view('users', [
            'users' => $users
        ]);
    }

    // Show the create user form
    public function create()
    {
        return view('users.create');
    }

    // Store a new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'full_name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        unset($validated['avatar']);

        if ($request->hasFile('avatar')) {
            $avatarPath = 'avatars/' . Str::uuid() . '.jpg';

            $image = Image::read($request->file('avatar'))
                ->cover(300, 300)
                ->toJpeg(80);

            Storage::disk('public')->put(
                $avatarPath,
                (string) $image
            );

            $validated['avatar'] = $avatarPath;
        }

        User::create($validated);

        return redirect('/users')
            ->with('success', 'User created successfully!');
    }

    // Display a specific user
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    // Show the edit user form
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    // Update an existing user
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'full_name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        unset($validated['avatar']);

        if ($request->hasFile('avatar')) {
            $avatarPath = 'avatars/' . Str::uuid() . '.jpg';

            $image = Image::read($request->file('avatar'))
                ->cover(300, 300)
                ->toJpeg(80);

            Storage::disk('public')->put(
                $avatarPath,
                (string) $image
            );

            $oldAvatar = $user->avatar;

            $validated['avatar'] = $avatarPath;

            $user->update($validated);

            // Delete the old avatar only after replacement succeeds
            if ($oldAvatar) {
                Storage::disk('public')->delete($oldAvatar);
            }
        } else {
            $user->update($validated);
        }

        return redirect('/users')
            ->with('success', 'User updated successfully!');
    }

    // Delete a user
    public function destroy(User $user)
    {
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return redirect('/users')
            ->with('success', 'User deleted successfully!');
    }
}
