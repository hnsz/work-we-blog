<form method='post' action='/comment'>
	@csrf
	@method('post')
	@if ($errors->any()) 
		<div class='row '>
		<ul class='list-group bg-danger rounded'>

		@foreach ($errors->all() as $error)
			<li class='border-danger text-danger list-group-item list-group-item-action'>{{$error}}</li>
		@endforeach
		</ul>
		</div>
	@endif
	<div class='form-group'>
	    <div class=''>minor title</div> 
	    <input type='text' name='minor_title' placeholder='Or leave empty' class='form-control' maxlength='25' value="{{old('minor_title')}}">
	    <div class=''>message</div>
	    <textarea rows='10' cols='70' name='body' placeholder="Keep it civil.." required class='form-control'>{{old('body')}}</textarea>
	</div>

	<div class=''>
	<input type='submit' name='submit' class='form-control btn-dark'>
	</div>
	
	

</form>
