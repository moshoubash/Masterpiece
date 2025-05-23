<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Services\CreateNewActivity;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => [
            'required',
            'confirmed',
            Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
        ],
        ]);

        $user = User::create([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => Hash::make($request->password),
            'slug' => Str::slug($request->first_name . '-' . $request->last_name . '-' . time()),
        ]);

        (new CreateNewActivity(
            $user->id,
            'user',
            'User Registration',
            "User {$user->first_name} {$user->last_name} registered with email {$user->email}"
        ))->execute();

        if($request->role == 'renter'){
            $role = Role::where('name', 'renter')->first();
            $user->roles()->attach($role);
        }

        if($request->role == 'host'){
            $role = Role::where('name', 'host')->first();
            $user->roles()->attach($role);
        }

        if($request->role == 'company'){
            $role = Role::where('name', 'company')->first();
            $user->roles()->attach($role);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended(route('home'));
    }
}
