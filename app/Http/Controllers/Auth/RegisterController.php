<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
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
    protected $redirectTo = '/home';
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:editor');
        $this->middleware('guest:writer');
        $this->middleware('guest:moderator');
        $this->middleware('guest:adops');
    }

/*
    |--------------------------------------------------------------------------
    | Admin Register Function
    |--------------------------------------------------------------------------
*/
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }

/*
    |--------------------------------------------------------------------------
    | Editor Register Function
    |--------------------------------------------------------------------------
*/
    public function showEditorRegisterForm()
    {
        return view('auth.register', ['url' => 'editor']);
    }
    protected function createEditor(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Editor::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/editor');
    }

/*
    |--------------------------------------------------------------------------
    | Writer Register Function
    |--------------------------------------------------------------------------
*/
    public function showWriterRegisterForm()
    {
        return view('auth.register', ['url' => 'writer']);
    }
    protected function createWriter(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Writer::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/writer');
    }

/*
    |--------------------------------------------------------------------------
    | Moderator Register Function
    |--------------------------------------------------------------------------
*/
    public function showModeratorRegisterForm()
    {
        return view('auth.register', ['url' => 'moderator']);
    }
    protected function createModerator(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Moderator::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/moderator');
    }

/*
    |--------------------------------------------------------------------------
    | Manager Register Function
    |--------------------------------------------------------------------------
*/
    public function showAdOpsRegisterForm()
    {
        return view('auth.register', ['url' => 'adops']);
    }
    protected function createAdOps(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = AdOps::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/adops');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
