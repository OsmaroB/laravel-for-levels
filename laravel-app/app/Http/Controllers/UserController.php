<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::latest()->get();

        return view('users.index',[
            'users' => $users
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' =>['required', 'min:8'],
        ]);
        $hash = password_hash($request->password, PASSWORD_DEFAULT);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hash,
        ]);

        return back();
    }

    public function destroy(User $user){
        $user->delete();

        return back();
    }
}
