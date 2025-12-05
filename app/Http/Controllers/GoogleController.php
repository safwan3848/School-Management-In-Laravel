<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // Redirect user to Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            // dd($googleUser);
            // if (!$googleUser->email) {
            //     return redirect()->route('login')->with('error', 'Email permission is required.');
            // }

            $existingUser = User::where('email', $googleUser->email)->first();

            if ($existingUser) {
                $existingUser->update([
                    'google_id' => $googleUser->id,
                    'email_verified_at' => $existingUser->email_verified_at ?? Carbon::now()
                ]);

                Auth::login($existingUser);
                return redirect()->intended('/');
            }

            // Create new user
            $newUser = User::create([
                'name' => $googleUser->name ?? 'Unknown User',
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => Hash::make(uniqid()), // secure random password
                'email_verified_at' => Carbon::now(),
                'role' => 'user',
            ]);

            Auth::login($newUser);
            return redirect()->intended('/');

        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Google Login Failed: ' . $e->getMessage());
        }
    }
}
