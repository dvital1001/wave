<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
		return view('users')->with('users', User::orderBy('name', 'asc')->join('contacts', 'contacts.user_id', '=', 'users.id')->select(['contacts.votes', 'users.*'])->paginate(10));
	}
}
