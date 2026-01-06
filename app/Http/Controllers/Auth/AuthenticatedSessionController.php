<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $response = Http::api()->post('/users/login',[
        /*$response = Http::post('http://localhost:8000/api/users/login', [*/
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
			// elmentjük a bejelentkezési adatokat a session-be.
             
            $user = $response['user'];
            $token = $user['token'];
            session([
                'api_token' => $token,
				'user_email' => $user['email'],
            ]);

            return redirect(route("movies.index"));
        }

        return back()->withErrors([
            'email' => 'Hibás bejelentkezési adatok.',
        ]);
    }
	
	public function destroy(Request $request)
    {
        session()->forget('api_token');

        return redirect('/');
    }

}
