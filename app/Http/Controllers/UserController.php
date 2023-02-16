<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tool;


class UserController extends Controller
{
    public function show (User $user){
        return view('users.show', compact('user'));
    }
    
}

