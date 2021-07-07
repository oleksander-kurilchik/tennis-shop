<?php

namespace App\Http\Controllers\Account\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Account\Auth\Traits\AuthenticatesUsers;
use Socialite;
use Auth;
use TrekSt\Modules\FrontendUsers\Models\FrontendUser as User;
use TrekSt\Modules\FrontendUsers\Models\SocialAccount;
use TrekSt\Modules\FrontendUsers\Repositories\Frontend\FrontendUsersRepository;
use TrekSt\Modules\FrontendUsers\Repositories\Frontend\SocialAccountRepository;

class AuthSocialController extends Controller
{

    public function __construct()
    {
        $this->userRepository = new FrontendUsersRepository();
        $this->socialRepository = new SocialAccountRepository();
    }

    public function redirectTo($provider)
    {
        $this->checkProvider($provider);
        return \Socialite::driver($provider)->redirect();
    }

    public function handleCallback($provider)
    {
        $this->checkProvider($provider);
        $socialiteUser = Socialite::driver($provider)->user();
        $user = $this->findOrCreateUser($provider, $socialiteUser);
        auth('frontend')->login($user, true);
        return redirect(route('frontend.index'));
    }

    protected function findOrCreateUser($provider, $socialiteUser)
    {
        if ($user = $this->userRepository->findBySocialiteProvider($provider, $socialiteUser->getId())) {
            return $user;
        }
        if ($user = $this->userRepository->findByEmail($socialiteUser->getEmail())) {
            $this->addSocialAccount($provider, $user, $socialiteUser);
            return $user;
        }
        $user = $this->userRepository->createFromSocialite($socialiteUser);
        $this->addSocialAccount($provider, $user, $socialiteUser);
        return $user;
    }


    protected function addSocialAccount($provider, $user, $socialiteUser)
    {
        $this->socialRepository->create([
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

    protected function checkProvider(string $provider)
    {
        return in_array($provider,['facebook','google'])?:abort(404);
    }
}
