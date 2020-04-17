@extends('layouts.app')

@section('content')

<div id="app"></div>


@foreach ($tickets as $ticket)
	<p><a href="<?=route('ticket.edit', ['id'=>$ticket->id])?>">{{ $ticket->title }} ("{{ $ticket->text }}") </a> <a href="<?=route('ticket.delete', ['id'=>$ticket->id])?>">[delete]</a></p> 
@endforeach

{{ $tickets->links() }}

<a href="<?=route('ticket.create')?>">new ticket</a> | 
<a href="<?=route('ticket.tickets')?>">tickets</a>

@endsection

@section('title', 'Users list')
