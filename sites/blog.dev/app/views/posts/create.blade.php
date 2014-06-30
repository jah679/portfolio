@extends('layouts.master')

@section('content')
    <h1>Create new post</h1>
	<form action="{{{ action('PostsController@store') }}}" method="POST">
	<label for="title">Post Title</lable>
	<input type="text" id="title" name="title" value="{{{ Input::old('title') }}}">
	<br>
	<label for="body">Post Body</lable>
	<textarea id="body" name="body">{{{ Input::old('body') }}}</textarea> 
	<input type="Submit">
	</form>
@stop