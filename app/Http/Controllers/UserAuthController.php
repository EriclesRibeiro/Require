<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Room;

class UserAuthController extends Controller
{
    function login()
    {
        if(session()->has('LoggedUser')){
            return redirect('dashboard');
        } else {
            return view('home');
        }
    }
    function register()
    {
        return view('register');
    }

    function create(Request $request)
    {
        // return $request->input();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:20'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $query = $user->save();

        if ($query) {
            return back()->with('success', 'Cadastrado com sucesso!');
        } else {
            return back()->with('fail', 'Algo deu errado ao cadastrar!');
        }
    }
    function check(Request $request){
        // return $request->input();
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:20'
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('LoggedUser', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Senha inválida!');
            }
        } else {
            return back()->with('fail', 'Não existe conta alguma com esse email!');
        }
    }
    function authenticated(){
        if(session()->has('LoggedUser')){
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];
            $rooms = Room::where('fk_user', '=', session('LoggedUser'))->get();
            // $rooms = Room::all();
        } else {
            return redirect('/');
        }
        return view('logged.home', $data, ['rooms' => $rooms]);
    }
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }
}
