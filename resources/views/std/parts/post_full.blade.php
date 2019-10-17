<div class='card '>
        <article class='card-body'>
            <h4 class='card-title'> {{$post->title}}
                <span class=' badge badge-info'>{{$post->published_at}}</span>
                <span class=' badge badge-info'>{{$post->user->name}}</span>
            </h4>
        
                {!! $post->body !!}
        
            <div class='card-footer pb-5'>
            </div>
        </article>
        @include("std.parts.comment_section")
</div>  <!--//      close div.card -->
