@extends('layouts.default')

@section('header')
@include('parts.header', ['title' => 'Welcome to Slash', 'subtitle' => 'Create a new Post for your Weblog' ])
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

                    
                </div>

            </div>
            <div class="card-deck">
                
                    <!--// Summary of account. Where to go from here aside from the normal navigation //!-->
                <div class="card">
                    <a  class="card-header bg-success" href='/posts/create'>Write a new post for your web log.</a>
                </div>
                <div class="card">
                    <h6 class="card-header bg-success">Your Posts</a>
                    <ol class="card-body">
                        @foreach($posts as $post)
                        <li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>
                        @endforeach
                    </ol>
                </div>

            </ul>


@endsection







@section('links')
	@parent

	<a href="https://laravel.com/api">api</a>
@endsection
