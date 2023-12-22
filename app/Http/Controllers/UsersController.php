<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }
}
