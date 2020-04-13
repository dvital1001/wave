<?php

namespace App\Http\Controllers;
use App\User;
use App\Ticket;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function index()
    {
		return view('tickets')->with('tickets', Ticket::where('user_id', Auth::id())->paginate(10));
	}
	
	public function edit(Request $request, $id)
    {
		//return view('edit')->with('user', User::select(['contacts.phone', 'users.*'])->join('contacts', 'contacts.user_id', '=', 'users.id')->findOrFail($id))->with('id', $id);
	}
	
	public function update(Request $request, $id)
    {
		//$user = User::find($id);
		//$user->name = $request->all()['name'];
		//$user->email = $request->all()['email'];
		//$user->save();
		
		//$contact = new Contact;
		//$contact->phone = $request->all()['phone'];
		//$contact->status = rand(0,3);
		//$contact->user()->associate(User::find($id));
		//$contact->save();
		
		//return redirect()->route('edit', ['id'=>$id]);
	}
}
