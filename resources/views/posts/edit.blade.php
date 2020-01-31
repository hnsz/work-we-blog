@extends('layouts.default')

@section('header')
@include('parts.header', ['title' => 'Welcome to Slash', 'subtitle' => 'Edit Post' ])
@endsection



@section('content')
	@include('parts.form_post_edit')
@endsection


@section('links')
	@parent

	<a href="https://laravel.com/api">api</a>
@endsection
