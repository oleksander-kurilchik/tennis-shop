<?php

namespace App\Http\Controllers\Account\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Account\Auth\Traits\AuthenticatesUsers;
use Socialite;
use Auth;
use TrekSt\Modules\FrontendUsers\Models\FrontendUser as User;
use TrekSt\Modules\FrontendUsers\Models\SocialAccount;

class AuthFacebookController extends Controller
{
    public function redirectTo()

    {

        return \Socialite::driver('facebook')->redirect();

    }


    public function handleCallback()

    {


        $provider = 'facebook';
        $socialiteUser = Socialite::driver($provider)->user();
        $user = $this->findOrCreateUser($provider, $socialiteUser);
        auth('frontend')->login($user, true);
        return redirect('/');



    }






    public function findOrCreateUser($provider, $socialiteUser)
    {
        if ($user = $this->findUserBySocialId($provider, $socialiteUser->getId())) {
            return $user;
        }

        if ($user = $this->findUserByEmail($provider, $socialiteUser->getEmail())) {
            $this->addSocialAccount($provider, $user, $socialiteUser);

            return $user;
        }

        $user = User::create([
            'first_name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'password' => bcrypt(str_random(25)),
            'status' => 'active',
        ]);

        $this->addSocialAccount($provider, $user, $socialiteUser);

        return $user;
    }


    public function findUserBySocialId($provider, $id)
    {
        $socialAccount = SocialAccount::where('provider', $provider)
            ->where('provider_id', $id)
            ->first();

        return $socialAccount ? $socialAccount->user : false;
    }

    public function findUserByEmail($provider, $email)
    {
        return User::where('email', $email)->first();
    }

    public function addSocialAccount($provider, $user, $socialiteUser)
    {
        SocialAccount::create([
            'users_id' => $user->id,
            'provider' => $provider,
            'provider_id' => $socialiteUser->getId(),
            'token' => $socialiteUser->token,
         //   'token_secret' => $socialiteUser->tokenSecret,
            'expires_in' => $socialiteUser->expiresIn,
            'name' => $socialiteUser->getName(),
            'nick_name' => $socialiteUser->getNickname(),
            'avatar' => $socialiteUser->getAvatar(),
            'email' => $socialiteUser->getEmail(),
            'refresh_token' => $socialiteUser->refreshToken,
        ]);
    }
}
