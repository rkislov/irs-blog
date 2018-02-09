<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Ramsey\Uuid\Uuid;

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
    protected $redirectTo = '/my/accounts';

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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {

        try {
            $this->validator($request->all())->validate();
        }
        catch(\Exception $e) {
           return back()->with('error', $e->getMessage());
        }

        $email = $request->input('email');
        $password = $request->input('password');
        $isAuth = $request->input('remember') ? True: False;
        $objUser = $this->create(['email'=>$email, 'password'=>$password]);
        if(!($objUser instanceof User)){
            return back()->with('error', "Cant create object");
        }
        if($isAuth){

            $this->guard()->login($objUser);
        }
        return redirect(route('account'))->with('success', "Вы успешно вошли");
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        return User::create([
            //'name' => $data['name'],
            'id' => Uuid::uuid4(),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
