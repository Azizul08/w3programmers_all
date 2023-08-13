<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function show(User $user)
    {   
        // dd('hlw');
        return $user->name."<br>".$user->email;
    }
}
