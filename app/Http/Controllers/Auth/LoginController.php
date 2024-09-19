<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


    // protected function credentials(Request $request)
    // {
    //     $credentials = $request->only($this->username(), 'password');
    //     $credentials['active'] = 1; // Check if the user is active
    //     return $credentials;
    // }

    // protected function sendFailedLoginResponse(Request $request)
    // {
    //     $this->validateLogin($request);

    //     if ($this->hasTooManyLoginAttempts($request)) {
    //         $this->fireLockoutEvent($request);
    //         throw $this->buildLockoutResponse($request);
    //     }

    //     $user = User::where($this->username(), $request->{$this->username()})->first();

    //     if ($user && !$user->active) {
    //         return redirect()->back()->withErrors([
    //             $this->username() => ['Your account is inactive. Please contact support.'],
    //         ]);
    //     }

    //     $this->incrementLoginAttempts($request);

    //     throw $this->validationException($request, $this->credentials($request));
    // }
}


