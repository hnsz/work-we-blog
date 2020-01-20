<div class='card '>
    <h4 class='card-title'> {{$post->title}}
        <span class=' badge badge-info'>{{$post->published_at}}</span>
        <span class=' badge badge-info'>{{$post->user->name}}</span>
    </h4>
    <article class='card-body'>
        <pre>{!! $post->body !!}</pre>
    </article>


</div>  <!--//      close div.card -->
    @include("comment.section")
