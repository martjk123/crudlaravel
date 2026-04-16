<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class usersController extends BaseController
{
    public function index(){
        $users = User::all();
        return view('userView', compact('users'));
    }

    public function store(Request $request){
        $user = User::create([ 
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('home');
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('userInfo', compact('user'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('userEdit', compact('user'));
    }

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('home')->with('success', 'User updated successfully!');
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('home')->with('success', 'User deleted successfully!');
}
}