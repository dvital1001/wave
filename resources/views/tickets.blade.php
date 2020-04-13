@extends('layouts.app')

@section('content')

@foreach ($tickets as $ticket)
	<p><a href="<?=route('ticket.edit', ['id'=>$ticket->id])?>">{{ $ticket->title }} ("{{ $ticket->text }}") </a></p>
@endforeach

{{ $tickets->links() }}

<a href="<?=route('ticket.create')?>">new ticket</a>

@endsection

@section('title', 'Users list')
