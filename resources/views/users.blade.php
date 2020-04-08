@extends('master')

@section('content')

@foreach ($users as $user)
	<p><a href="<?=route('edit', ['id'=>$user->id])?>">{{ $user->name }} {{ $user->fname }} {{ $user->votes }}</a></p>
@endforeach

{{ $users->links() }}

@endsection

@section('title', 'Users list')
