<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Room;

class RoomAuthController extends Controller
{
    

    function room(){
        if(session()->has('LoggedUser')){
            return view('logged.registerRoom');
        } else {
            return redirect('/');
        }
    }
    function createRoom(Request $request){
        // return $request->input();
        // echo session('LoggedUser');
        $request->validate([
            'name'=>'required',
            'description'=>'',
            'password'=>'required|min:4|max:12'
        ]);
        $room = new Room;
        $room->name = $request->name;
        $room->description = $request->description;
        $room->password = Hash::make($request->password);
        $room->fk_user = session('LoggedUser');
        $query = $room->save();

        if ($query) {
            return back()->with('success', 'Sala cadastrada com sucesso!');
        } else {
            return back()->with('fail', 'Algo deu errado ao cadastrar!');
        }
    }
}
