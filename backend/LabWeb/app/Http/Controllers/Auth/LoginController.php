<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request){
        return [
            'CODIGO' => $request->get("codigo"),
            'CLAVE' => $request->get("password"),
        ];
    }
    public function username(){
        return 'codigo';
    }
    public function authenticate(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'codigo' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'CODIGO' => $request->get("codigo"),
            'CLAVE'=> Hash::make($request->get("password"))
        ];
        //return User::where("codigo", $request->get("codigo"))->first()->CLAVE;
        $user = User::where("codigo", $request->get("codigo"))->first();
        if (Hash::check($request->get("password"), $user->CLAVE)) {
            // The passwords match...
            //return "son iguales";
            Auth::login($user);
            $user = Auth::user();

        $token_name = $request->input('token_name', 'api-token');

        $abilities = $request->input('abilities', [
            'order:create',
            'order:view',
            'WLR3:check_availability'
        ]);
        $token = $user->createToken($token_name, $abilities);
            return $token;
        }
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }else{
            return "Error";
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }
}
