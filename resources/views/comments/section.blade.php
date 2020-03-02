
<div style='transbackground-color:rgba(0,0,0,0.4); padding:10px;'>
@include('comments.form')
</div>


@if($thread !== null)
<div class='thread'>
  @foreach($thread->replies as $reply)
    @include('comments.subthread', ['comment' => $reply])
  @endforeach
</div>
@endif
