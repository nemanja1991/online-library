<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use App\Enums\UserTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.create_user');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'surname'   => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password'  => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', new Enum(UserTypeEnum::class)],
        ]);

        $user = User::create([
            'name'      => $request->name,
            'surname'   => $request->surname,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function index()
    {
        return view('auth.index',
            ['users' => User::all()]
        );
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return view('auth.index',
            ['users' => User::all()]
        )->with('success', __('User successuly removed.'));
    }

    public function edit($id)
    {
        return view('auth.edit',
            ['user' => User::find($id)]
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'surname'   => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'user_type' => ['required', new Enum(UserTypeEnum::class)],
        ]);
        
        $id         = $request->id;

        User::where('id', $id)->update(
            [
                'name'      => $request->name,
                'surname'   => $request->surname,
                'email'     => $request->email,
                'user_type' => $request->user_type
            ]
        );
        
        return view('auth.index', ['users' => User::all()])->with('success', __('User successuly updated.'));
    }
}
