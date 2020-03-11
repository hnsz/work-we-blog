<div class='card '>
    <h4 class='card-title'> {{$post->title}}
        <span class=' badge badge-info'>{{$post->published_at}}</span>
        <span class=' badge badge-info'>{{$post->user->name}}</span>
    </h4>


    @can('update', $post)
        <a href="/posts/{{$post->id}}/edit">edit</a>
    @endcan
    @cannot('update', $post)
        <a href="/posts/{{$post->id}}/edit">cannot edit</a>
    @endcannot
    <article class='card-body'>
        <pre>{!! $post->body !!}</pre>
    </article>


</div>  <!--//      close div.card -->