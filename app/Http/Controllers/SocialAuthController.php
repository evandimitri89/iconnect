<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $userSocial = Socialite::driver('google')->stateless()->user();
        return $this->findOrCreateSocialUser($userSocial, 'google');
    }

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        $userSocial = Socialite::driver('github')->stateless()->user();
        return $this->findOrCreateSocialUser($userSocial, 'github');
    }

    protected function findOrCreateSocialUser($providerUser, $provider)
    {
        $email = $providerUser->getEmail();

        if (!$email) {
            return redirect()->route('login')->withErrors(['email' => 'No email provided by provider.']);
        }

        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $providerUser->getName() ?? $providerUser->getNickname() ?? 'User_' . $provider,
                'password' => bcrypt(Str::random(24)), // random password
                // optional: store provider info
                // 'provider' => $provider,
                // 'provider_id' => $providerUser->getId(),
            ]
        );

        Auth::login($user, true); // login and remember
        return redirect()->intended(route('dashboard'));
    }
}
