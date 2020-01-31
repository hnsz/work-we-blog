<form method='post' action='/posts'>
	@csrf
	@method('post')
	@if ($errors->any()) 
		<div class='row '>
		<ul class='list-group bg-danger rounded col-xl-12'>

		@foreach ($errors->all() as $error)
			<li class='border-danger text-danger list-group-item list-group-item-action'>{{$error}}</li>
		@endforeach
		</ul>
		</div>
	@endif
	<div class='form-group'>
	<div class='row'>
		<div class='col-xl-3'>title</div>
    <input type='text' name='title' placeholder='' class='form-control col-xl-9' required value="{{$post->title}}">
	</div>

	<div class='row'>
		<div class='col-xl-3'>message</div>
    <textarea rows='20' cols='80' name='body' placeholder="" required class='form-control col-xl-9'>{{$post->body}}</textarea>
	</div>

	<div class='row'>
	<div class='col-xl-10'></div>
	<input type='submit' name='submit' class='form-control btn-dark col-xl-2'>
	</div>
	
	</div>

</form>
