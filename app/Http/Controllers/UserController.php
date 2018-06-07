<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function listUsers() {

    	$users = User::paginate(10);

    	return $users;
    }
    public function searchUsers(Request $request) {

        $query = $request->input('query');

        $users = User::where('name','like','%'.$query.'%')->orWhere('email','like','%'.$query.'%')->paginate(10);

        return $users;

    }
}
