<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTicketRequest;
use App\Ticket;
use Auth;
use App\User;

class TicketsController extends Controller
{
	public function index()
    {
		//dump("Auth::id() = ".Auth::id());
		return view('tickets')->with('tickets', Ticket::where('user_id', Auth::id())->paginate(10));
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
		return view('create')->with('ticket', Ticket::findOrFail($id));
	}
	
	public function update(\App\Http\Requests\CreateTicketRequest $request)
    {
		//Ticket::create($request->only(['title', 'text',]) + ['user_id' => Auth::id()]);
		return redirect()->route('ticket.index');
	}
}
