<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function show(User $user, Request $request)
    {   
        // $value = $request->session()->get('key', 'default');
        // $value = $request->session()->all();
        // $value = $request->session()->put('key', 'value');
        // $value = $request->session()->increment('count');
        // $value = $request->session()->increment('count', $incrementBy = 5);
        $value =$request->session()->flash('status', 'Task was successful!');
        dd($value);
        return $user->name."<br>".$user->email;
    }

    public function showAge(Request $request){
        echo "Welcome You're $request->age years Old";

    }
}
