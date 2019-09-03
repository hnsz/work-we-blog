@extends('std.layouts.default')

@section('header')
@include('std.parts.header', ['title' => 'Welcome to Slash', 'subtitle' => 'Create a new Post for your Weblog' ])
@endsection

@section('content')


            <!--// This should be a flash message //!-->
            <div class="card">
                <div class="card-header bg-success">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <!--// Summary of account. Where to go from here aside from the normal navigation //!-->
            <a href='/posts/create'>Write a new post for your web log.</a>



@endsection







@section('links')
	@parent

	<a href="https://laravel.com/api">api</a>
@endsection
