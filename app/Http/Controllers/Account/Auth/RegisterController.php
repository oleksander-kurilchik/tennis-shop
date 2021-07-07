<?php

namespace App\Http\Controllers\Account\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Account\Auth\Traits\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use LVR\Phone\Phone;
use TrekSt\Modules\FrontendUsers\Models\FrontendUser;
use TrekSt\Modules\Regions\Models\Country;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:frontend');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, $this->registrationRules());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return TrekSt\Modules\FrontendUsers\Models\FrontendUser
     */
    protected function create(array $data)
    {
        $dataUser = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'status' => 'active',
            'password' => Hash::make($data['password']),
        ];


        return FrontendUser::create($dataUser);
    }

    protected function registrationRules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],

            'phone' => [
                'required', 'string', 'max:255',
                new Phone()
            ],

            'rules-confirmation'=>['required','boolean'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:frontend_users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
//            'g-recaptcha-response' => ['required','captcha'],
        ];

    }

//    /frontend.account.register
    public function showRegistrationForm()
    {

        $test = 2;
        return view('frontend.account.auth.register', compact('test'));
    }


}
