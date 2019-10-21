 
<div class='row '>
    <ul class='list-group bg-danger rounded'>

    @foreach ($errors->all() as $error)
    
    <li class='border-danger text-danger list-group-item list-group-item-action'>{{$error}}</li>
    @endforeach
    </ul>
</div>
