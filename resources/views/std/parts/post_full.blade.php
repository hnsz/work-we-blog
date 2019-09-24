<article class='card'>
    <div class='card-body'>
    <h4 class='card-title'>{{$post->title}}
        <span class=' badge badge-info'>{{$post->published_at}}</span>
        <span class=' badge badge-info'>{{$post->user->name}}</span>
        </h4>
    <p class='card-text'>{{$post->body}}
    
        <ul class="card-footer nav navbar">
        <li class='nav-item '><a href="/posts/{{$post->id}}/comments/write" class='nav-item text-primary'>Write a Comment..</a></li>
        </ul>
    </div>
</article>
