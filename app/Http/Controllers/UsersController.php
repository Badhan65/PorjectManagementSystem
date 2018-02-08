<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function view(){
        $users= User::all();
        return view('admin.add_user')->with('users',$users);
    }
    public function edit($id){
       $user=User::findOrFail($id);
       return view('admin.user_edit')->with('user',$user);

    }
    public function update(Request $request, $id){
        $user=User::findOrFail($id);
        $user->name= $request->input('name');
        $user->email=$request->input('email');
        $user->status= $request->input('status');
        $user->designation=$request->input('designation');
        $user->save();

        return redirect('users');
    }
    public function destroy($id){
        $user =User::findOrFail($id);
        $user->delete();
        return redirect('users');
    }
}
