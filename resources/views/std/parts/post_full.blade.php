<article class='card'>
    <div class='card-body'>
    <h4 class='card-title'>{{$post->title}}
        <span class=' badge badge-info'>{{$post->published_at}}</span>
        <span class=' badge badge-info'>{{$post->user->name}}</span>
        </h4>
        <p class='card-text'>{{$post->body}}
    
        @include("std.parts.comment_form")
        <div class='card-footer'>
        </div>
        
    </div>
</article>
