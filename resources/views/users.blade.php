@extends('master')

@section('content')

@foreach ($users as $user)
	<p>{{ $user->name }} {{ $user->fname }} {{ $user->votes }}</p>
@endforeach

{{ $users->links() }}

@endsection

@section('title', 'Users list')
