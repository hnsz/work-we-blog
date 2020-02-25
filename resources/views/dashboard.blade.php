@extends('layouts.default')

@section('header')
@include('parts.header', ['title' => 'Welcome to Slash', 'subtitle' => 'Dashboard' ])
@endsection

@section('content')


            <div class='card-deck'>
                <div class="card-group w-100">
                    <div class="card">

                        <div class="card-header"></div>
                        <div class="card-body">
                            <h6 class="card-title"> Your Info</h6>
                        <table class='card-text'>
                            <tr>
                                <th>Name:</th>
                                <td>{{$name}}</td>
                                
                            </tr>
                            <tr>
                                <th>Joined</th>
                                <td>{{$member_since}}</td>
                            </tr>
                            <tr>
                                <th>E-mail:</th>
                                <td>{{$email}}</td>
                                
                                @if($verified)
                                <td class='badge badge-success'>Verified</td>
                                @else
                                <td class='badge badge-warning'>Not-Verified</td>
                                @endif
                            </tr>
                        </table>
                        </div>
                    </div>

                    <div class="card">
                        
                        <div class="card-header"></div>
                        <div class='card-body'>
                            <h6 class="card-title">Your Posts</h6>
                            <ul class="card-text">
                                @foreach($posts as $post)
                                    <li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>
                                @endforeach
                            </ul>
                            <a  class="btn btn-primary" href='/posts/create'>Write a new post for your web log.</a>
                        </div>
                    </div>
                </div>
                <div class="card-group w-100">
                    <div class="card">
                    </div>
                </div>
            </div>


@endsection







@section('links')
	@parent

	<a href="https://laravel.com/api">api</a>
@endsection
