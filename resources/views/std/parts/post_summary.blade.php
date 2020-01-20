<article class='card'>
    <div class='card-body'>
        <span style='float:right;' class='badge badge-info'> {{$post->published_at}}
        </span>
        <span style='float:right;'>
            /
        </span>
        <span style='float:right;' >
            <a class='badge badge-info' href='/user/id/{{$post->user->name}}'>{{$post->user->name}}</a> 
        </span>
    <h6 class='card-title' style='clear:both;'>
        
        
        {{$post->title}}

</h6>
    <p class='card-text' >
        {{Str::limit($post->body, 176)}}
        <span class='card-link text-*-right'><a href='/posts/{{$post->id}}/'>Read More.. </a></span></p>
    </div>
</article>
