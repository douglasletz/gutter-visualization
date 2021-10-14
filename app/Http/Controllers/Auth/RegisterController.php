<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string','min:4', 'max:14'],
            'last_name' => ['required', 'string','min:4', 'max:14'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'state' => ['nullable', 'string', 'min:4', 'max:14'],
            'city' => ['nullable', 'string', 'min:4', 'max:14'],
            'zip' => ['nullable', 'regex:/^[A-Za-z]+\d+[A-Za-z0-9]*$|^\d+[A-Za-z0-9]*$/', 'min:3','max:14'],
            'password' => ['required','same:confirm_password', 'string', 'min:8', 'max:20'],
            'phone_number' => ['required', 'string', 'min:8', 'max:14'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
