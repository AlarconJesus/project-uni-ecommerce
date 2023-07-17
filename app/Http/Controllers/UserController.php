<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.destroy')->only('eliminarUsuario', 'destroy');
        $this->middleware('can:users.ban')->only('ban', 'updateBan');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function ban(User $user)
    {
        if ($user->isBanned()) {
            $user->unBan();
        } else {
            $user->ban();
        }

        $users = User::all();

        return redirect()->route('users.index', compact('users'));
    }

    public function updateBan(User $user)
    {
        if (!empty(request('banned'))) {
            $user->ban();
        }

        return redirect('users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('roles', 'user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('users.edit', $user)->with('info', 'Se asigno los roles correctamente');
    }



    public function eliminarUsuario($id)
    {

        $user = User::find($id);
        return view('users.delete-user-form', compact('user'));
    }

    public function destroy(User $user, Request $request)
    {
        $usuarioA = User::find(1);
        $user2 = auth()->user();

        $ps = $request->password;
        $psa = $request->passworda;

        if ($user->hasRole('Admin')) {

            if (Hash::check($ps, $user2->password, []) && Hash::check($psa, $usuarioA->password, [])) {
                $user->deleteProfilePhoto();
                $user->tokens->each->delete();
                $user->delete();

                return redirect()->route('users.index');
            } else {
                return redirect()->back()->with('status', 'clave invalida');
            }
        }
        if (Hash::check($ps, $user2->password, [])) {
            $user->deleteProfilePhoto();
            $user->tokens->each->delete();
            $user->delete();

            return redirect()->route('users.index');
        } else {
            return redirect()->back()->with('status', 'clave invalida');
        }
    }





    public function recuperaPS()
    {
        return view('auth.reset-password-questions');
    }

    public function recuperaPS2(Request $request)
    {
        $usuario = user::all('*')->where('email', $request->email)->first();

        $email = $request->email;
        $pregunta_secreta = $usuario->pregunta_secreta;

        return view('auth.reset-password-questions2', compact('pregunta_secreta', 'email'));
    }

    public function recuperaPS3(Request $request)
    {
        $usuario = user::all('*')->where('email', $request->email)->first();
        $email = $request->email;
        $pregunta_secreta = $usuario->pregunta_secreta;

        $rs = $request->respuesta_secreta;
        $respuesta_secreta_user = $usuario->respuesta_secreta;

        if (Hash::check($rs, $respuesta_secreta_user, [])) {
            return view('auth.reset-password-questions3', compact('email'));
        } else {
            return view('auth.reset-password-questions2', compact('pregunta_secreta', 'email'))->with('message', 'No coinciden');
        }

        return view('auth.reset-password-questions2', compact('pregunta_secreta', 'email'));
    }
    public function recuperaPS4(Request $request)
    {
        $usuario = user::all('*')->where('email', $request->email)->first();
        $usuario->forceFill([
            'password' => Hash::make($request['password']),
        ])->save();

        return redirect('login');
    }
}
