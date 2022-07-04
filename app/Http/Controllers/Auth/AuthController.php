<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Carbon\Carbon;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function logout(Request $request) {

        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $noti = [
            'message' => 'Usuário deslogado com sucesso!',
            'alert-type' => 'error'
        ];

        return redirect()->route('login')->with($noti);
    }

    public function profile() {
        return view('profile.profile');
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ], [
            'name.required' => 'O campo de NOME não pode ser vazio.',
            'email.required' => 'O campo de E-MAIL não pode ser vazio.'
        ]);

        User::findOrFail($request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Informações do usuário atualizadas!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($noti);
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ], [
            'current_password.required' => 'O campo de SENHA ATUAL não pode ser vazio.',
            'password.required' => 'O campo de NOVA SENHA não pode ser vazio.'
        ]);

        $senha_cript = User::findOrFail($request->user_id)->password;

        if(Hash::check($request->current_password, $senha_cript)) {

            User::findOrFail($request->user_id)->update([
                'password' => Hash::make($request->password),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->route('auth.logout');
        }

    }
}
