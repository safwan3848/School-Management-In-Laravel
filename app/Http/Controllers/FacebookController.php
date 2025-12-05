<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    // Redirect to Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback handler
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            if (!$facebookUser->email) {
                return redirect()->route('login')
                    ->with('error', 'Facebook account does not have an email address.');
            }

            $existingUser = User::where('email', $facebookUser->email)->first();

            if ($existingUser) {
                // Update facebook_id if user logs in again through Facebook
                $existingUser->update([
                    'facebook_id' => $facebookUser->id,
                    'email_verified_at' => $existingUser->email_verified_at ?? Carbon::now()
                ]);

                Auth::login($existingUser);
                return redirect()->intended('home');
            }

            // Create new account
            $newUser = User::create([
                'name' => $facebookUser->name ?? 'Unknown User',
                'email' => $facebookUser->email,
                'facebook_id' => $facebookUser->id,
                'password' => Hash::make(uniqid()), // secure temporary password
                'email_verified_at' => Carbon::now(),
                'role' => 'user',
            ]);

            Auth::login($newUser);
            return redirect()->intended('home');

        } catch (Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Facebook Login Failed: ' . $e->getMessage());
        }
    }
}
