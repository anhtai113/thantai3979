<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
    	$data = User::all();
    	return view('users.index',compact('data'));
    }
}
