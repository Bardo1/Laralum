<?php

namespace Laralum\Laralum\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show index view.
     */
    public function index()
    {
        return view('laralum::index');
    }

    /**
     * Show login form.
     */
    public function show()
    {
        return view('laralum::login');
    }

    /**
     * Manual user login.
     *
     * @param $request
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended(route('Laralum::dashboard'));
        }

        return redirect()->route('Laralum::login')->with('error', trans('auth.failed'))->withInput();
    }
}
