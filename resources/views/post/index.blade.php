@extends('layouts.default')

@section('header')

	@include('parts.header', ['title' => "Welcome to Slash",  'subtitle' => 'Latest Articles'])

@endsection

@section('content')

<div class='card-deck'>

@foreach($posts as $post)

    @if($loop->first || $loop->odd)
        <div class='card-group w-100'>
    @endif

        @include('parts.post_summary', $post)

    @if($loop->last || $loop->even)
        </div> <!--//card group   -->
    @endif

@endforeach

</div> <!--//card Deck   -->

@endsection


@section('links')
	@parent

	<a href="https://laravel.com/api">api</a>
@endsection
