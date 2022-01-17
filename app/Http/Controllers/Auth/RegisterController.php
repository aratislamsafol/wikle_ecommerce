<?php

namespace App\Http\Controllers\Auth;

use App\District;
use App\Division;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use DB;

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
     * @override
     * Show registrationform override
     * Compact Distric & Divison for Registration Page
     *
     *
     */
    public function showRegistrationForm()
    {
        $districts = District::orderBy('district_name', 'asc')->get();
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view('auth.register',compact('districts','divisions'));
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
            'f_name' => ['required', 'string', 'max:50'],
            'l_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'max:15'],
            'division_id' => ['required','numeric'],
            'distric_id' => ['required','numeric'],
            'street_address' => ['required', 'max:100'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // $faker = Faker::create();
        return User::create([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'username'=>($data['l_name'].rand(1,300)),
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'street_address' => $data['street_address'],
            'division_id' => $data['division_id'],
            'district_id' => $data['distric_id'],
            'ip_address' =>request()->ip(),
            'role_id' => 2,
            'password' => Hash::make($data['password']),
        ]);
    }
}
