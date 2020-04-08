@extends('master')

@section('content')

<form action="<?=route('update', ['id'=>$id])?>" method="POST">
<input type="text" name="name" value="{{ $user->name }}">
<input type="text" name="email" value="{{ $user->email }}">
<input type="text" name="phone" value="{{ $user->phone }}">
<input type="submit">
@csrf	
</form>

@endsection

@section('title', 'Edit user №'.$id.'')
