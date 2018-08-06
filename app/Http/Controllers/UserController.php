<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct() {
        $this->roles = ['user','admin','guest'];
    }
    public function searchUsers(Request $request) {

        $data = $request->all();

        $users = User::where(function ($query) use($data) {
           if (isset($data['role'])) {
               $query->where('role',$data['role']);
           }
           $query->where(function ($search) use($data){
               $search->where('email','like','%'.$data['search'].'%')->orWhere('name','like','%'.$data['search'].'%' );
           });
        })->paginate(10);

        $roles = $this->roles;

        return $data = [
          'roles' => $roles,
          'users' => $users
        ];

    }
    
    public function getUser(Request $request)
    {
        $data = $request->all();

        $user = User::find($data['id']);

        return $user;
    }
}
