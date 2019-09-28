<form method='post' action='/posts/{post}/comment'>
	@csrf
	@method('post')
	
	@if ($errors->any())
	@include("std.parts.comment_form_errors")
	@endif

	
	<div class='input-group input-group-sm'>

	 <div class='input-group-prepend'>
		<label class="input-group-text btn btn-success">minor title</label>
		<input type='text' name='minor_title' placeholder='Or leave empty' class='form-control' maxlength='25' value="{{old('minor_title')}}">
	 </div>
	</div> 

	 <div class='input-group input-group-sm'>
	   <div class='input-group-prepend'>
		   <label class="input-group-text btn btn-success">your message</label>
		</div>
	    <textarea rows='4' cols='40' name='body' placeholder="Keep it civil.." required class='form-control'>{{old('body')}}</textarea>
   	   </div>

	    <div class=''>
	      <input type='submit' name='submit' class='form-control btn-dark'>
		</div>
	</div>
</form>
