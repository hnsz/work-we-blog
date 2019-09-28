<article class='card'>
    <div class='card-body'>
    <h4 class='card-title'>{{$post->title}}
        <span class=' badge badge-info'>{{$post->published_at}}</span>
        <span class=' badge badge-info'>{{$post->user->name}}</span>
        </h4>
        <p class='card-text'>{{$post->body}}
    
        <div class='card-footer'>
        <ul class="nav nav-tabs">
        <li class='nav-item '>
                <h6 class='nav-link active'>Write a Comment..</h6></li>
        </ul>
        @include("std.parts.comment_form")
        </div>
        
    </div>
</article>
