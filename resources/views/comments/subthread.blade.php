<ul class='list-group' >

        <li class='list-group-item border-0 p-1' >
        <ul class='list-group' >
                
                <li class='list-group-item border-1 small p-0 pl-4'>
                comment: {{$comment->commentthread_id}} :
                {{$comment->id}}
                user: {{$comment->user_id}}
                <a href="#!" class="card-link small">{{$comment->created_at}}</a>
                </li>

                <li class='list-group-item border-0'>
                @if($comment->title !== "none")
                <h6 class='small'>{{$comment->title}}</h6>
                @endif
                <p class="card-text small">
                        {{$comment->body}}
                </p>
                </li>
                
        </ul>
        </li>
@if($comment->threadstarter->commentthread !== null)
<li class='list-group-item border-0 pl-4'>
        @foreach($comment->threadstarter->commentthread->replies as $reply)
                @include('comments.subthread', ['comment' => $reply])
        @endforeach
</li>
@endif
</ul>