<article class='card'>
    <div class='card-body'>
    <h4 class='card-title'>{{$post->title}}
        <span class=' badge badge-info'>{{$post->published_at}}</span></h4>
    <p class='card-text'>{{$post->body}}
        <span class='card-link text-*-right'>Read More.. {{$post->id}}</span></p>
    </div>
</article>
