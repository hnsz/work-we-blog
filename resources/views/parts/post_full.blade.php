<div class='card '>
    <h4 class='card-title'> {{$title}}
        <span class=' badge badge-info'>{{$published_at}}</span>
        <span class=' badge badge-info'>{{$author}}</span>
    </h4>
    @if($show_edit_url)
        <a href="{{$edit_url}}">edit</a>
    @endif
    <article class='card-body'>
        <pre>{!! $body !!}</pre>
    </article>


</div>  <!--//      close div.card -->
    @include("comment.section")
