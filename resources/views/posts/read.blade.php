@extends('layouts.default')

@section('header')
@include('parts.header', ['title' => 'Welcome to Slash', 'subtitle' => 'Create a new Post for your Weblog' ])
@endsection



@section('content')
	@include('parts.post_full', $vm_post)

@endsection



@section('links')
	@parent

	<a href="https://laravel.com/api">api</a>
@endsection