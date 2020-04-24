<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\CreateTicketRequest;
//use App\Http\Requests\EditTicketRequest;
use App\Mail\AssigmentCreated;
use App\Ticket;
use Auth;
use App\User;
use File;
use Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManagerStatic as Image;

class TicketsController extends Controller
{
	public function index()
    {
		return view('tickets')->with('tickets', Ticket::where('user_id', Auth::id())->orderBy('title', 'asc')->paginate(10));
	}
	
	public function tickets()
    {
		Mail::to('info@sokov.org')->queue(new AssigmentCreated(Ticket::where('user_id', Auth::id())->first()));
		
		$query = 'voluptatem'; // <-- Change the query for testing.
		$tickets = Ticket::search($query)->get();
    	return response()->json($tickets);		
		
		
		Log::alert("сообщение");
		$users = cache()->remember('users', 7200, function(){
			return User::all();
		});
		//return response()->json(Ticket::all());
		//return Storage::disk('public')->download('66');
		return response()->json($users);
	}
	
	public function create()
	{
		return view('create');
	}
	
	public function store(\App\Http\Requests\CreateTicketRequest $request)
    {
		Ticket::create($request->only(['title', 'text',]) + ['user_id' => Auth::id()]);
		return redirect()->route('ticket.index');
	}
	
	public function edit(Request $request, $id)
	{
		return view('edit')->with('ticket', Ticket::findOrFail($id));
	}
	
	public function update(\App\Http\Requests\EditTicketRequest $request, $id)
    {
		$ticket = Ticket::findOrFail($id);
		$ticket->update($request->only(['title', 'text',]));
		
		$original = $request->file('img');
		
		$image = Image::make($original)->resize(150, null, function($constraint) {
			$constraint->aspectRatio();
		})->encode('jpg', 75);
		
		Storage::disk('public')->put(
			"{$id}", 
			$image->getEncoded()
		); 
		
		return redirect()->route('ticket.index');
	}
	
	public function delete(Request $request, $id)
	{
		$ticket = Ticket::findOrFail($id);
		$ticket->delete();
		return redirect()->route('ticket.index');
	}
}
