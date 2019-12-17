@extends('std.layouts.default')




@section('header')
    @include('std.parts.header', ['title' => "Welcome to We - Blog &#187;  NeXt geN",  'subtitle' => 'Latest Articles'])
@endsection




@section('links')
	@parent

	<a href="https://laravel.com/api">api</a>

@endsection
