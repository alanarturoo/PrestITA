<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        if (Auth::check()) {
            return redirect('home');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        
        $credentials = $request->getCredentials();
        
        $user = User::where('email', $credentials['email'])->first();
        if (!isset($user)) {
            return redirect('login')->withErrors('Login failed');
        }else 
        if ($user->password === $credentials['password'] ) {
            Auth::login($user);
            $request->session()->regenerate();
            return $this->authenticated($request, $user);
        }else{
            return redirect('login')->withErrors('Login failed');
        }

        /*  Codigo de prueba que dio error debido al metodo de encryptacion
        if (!Auth::validate($credentials)) {
            return redirect('login')->withErrors('auth.failed');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
        */
    }

    public function authenticated(Request $request, $user){
        return redirect('home');
    }
}
