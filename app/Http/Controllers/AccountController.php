<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{

    /**
     * Display my account page
     *
     * @return Response
     */
    public function index(): Response
    {
        return response()->view('page.account');
    }

    /**
     * Login user in to the system
     *
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        // implement login functionality

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('success'));
    }


    /**
     * Logout user from the system
     *
     */
    public function logout(Request $request)
    {
        // implement logout functionality

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Register user in the system
     *
     * @param Request $request
     */
    public function register(Request $request)
    {
        // implement register functionality

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:' . User::class,
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()->numbers()
            ],
            // 'subscribed' => 'optional',
        ]);

        $subscribed = $request->subscribed == 1;

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'subscribed' => $subscribed,
        ]);

        Auth::login($user);

        return redirect('/')
            ->with('status', "User registered successfully!");
    }

    /**
     * Display a success message for logged-in users
     *
     */
    public function success(Request $request)
    {
        // implement check if the user is authorized

        if (Auth::check()) {
            return view('page.success')
                ->with([
                    'firstname' => $request->user()->firstname,
                    'lastname' => $request->user()->lastname
                ]);
        }

        return redirect('/');
    }
}
