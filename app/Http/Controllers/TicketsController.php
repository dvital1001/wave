<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\CreateTicketRequest;
//use App\Http\Requests\EditTicketRequest;
use App\Ticket;
use Auth;
use App\User;

class TicketsController extends Controller
{
	public function index()
    {
		return view('tickets')->with('tickets', Ticket::where('user_id', Auth::id())->orderBy('title', 'asc')->paginate(10));
	}
	
	public function tickets()
    {
		//return response()->json(Ticket::all());
		//eturn response()->download('file.csv');
		return response()->json(['Tom', 'Jerry']);
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
		return redirect()->route('ticket.index');
	}
	
	public function delete(Request $request, $id)
	{
		$ticket = Ticket::findOrFail($id);
		$ticket->delete();
		return redirect()->route('ticket.index');
	}
}
