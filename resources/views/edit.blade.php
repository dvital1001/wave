@extends('layouts.app')

@section('content')

@if ($errors->any())
	<ul id="errors">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

<form action="<?=route('ticket.update', ['id'=>$ticket->id, ])?>" method="POST" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
<input type="text" name="title" value="{{ $ticket->title }}">
<textarea name="text">{{ $ticket->text }}</textarea>
<input type="file" name="img">
<input type="submit">
@csrf	
</form>

@endsection

@section('title', 'Create ticket')
