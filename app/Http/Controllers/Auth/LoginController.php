<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:editor')->except('logout');
        $this->middleware('guest:writer')->except('logout');
        $this->middleware('guest:moderator')->except('logout');
        $this->middleware('guest:adops')->except('logout');
    }

/*
    |--------------------------------------------------------------------------
    | Admin Login Function
    |--------------------------------------------------------------------------
*/
    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

/*
    |--------------------------------------------------------------------------
    | Editor Login Function
    |--------------------------------------------------------------------------
*/
    public function showEditorLoginForm()
    {
        return view('auth.login', ['url' => 'editor']);
    }

    public function editorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('editor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/editor');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function editorLogout()
    {
        Auth::guard('editor')->logout();
        return redirect('/');
    }

/*
    |--------------------------------------------------------------------------
    | Writer Login Function
    |--------------------------------------------------------------------------
*/
    public function showWriterLoginForm()
    {
        return view('auth.login', ['url' => 'writer']);
    }

    public function writerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('writer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/writer');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function writerLogout()
    {
        Auth::guard('writer')->logout();
        return redirect('/');
    }


/*
    |--------------------------------------------------------------------------
    | Moderator Login Function
    |--------------------------------------------------------------------------
*/
    public function showModeratorLoginForm()
    {
        return view('auth.login', ['url' => 'moderator']);
    }

    public function moderatorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('moderator')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/moderator');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function moderatorLogout()
    {
        Auth::guard('moderator')->logout();
        return redirect('/');
    }

/*
    |--------------------------------------------------------------------------
    | Manager Login Function
    |--------------------------------------------------------------------------
*/
    public function showAdOpsLoginForm()
    {
        return view('auth.login', ['url' => 'adops']);
    }

    public function adopsLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('adops')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/adops');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function adopsLogout()
    {
        Auth::guard('adops')->logout();
        return redirect('/');
    }
}
