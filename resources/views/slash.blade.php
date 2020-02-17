
@extends('layouts.default')




@section('header')
    @include('parts.header', ['title' => "Welcome to We - Blog >>  NeXt geN",  'subtitle' => 'Latest Articles'])
@endsection




@section('links')
	@parent

	<a href="https://laravel.com/api">api</a>

@endsection
