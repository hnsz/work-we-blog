<form method='post' action='/posts/{post}/comment' style='background-color:crimson; padding:10px;margin:15px;opacity:0.9;border-radius: 5px;'>
	@csrf
	@method('post')
	
	@if ($errors->any())
	@include("std.parts.comment_form_errors")
	@endif

	
	<div class='input-group input-group-sm'>
	   <div class='input-group-text input-group-prepend'>
			<label for="form[comment][item[body]]">Write a Comment</label>
	   </div>
	   <input type='text' name='minor_title' placeholder='title is optional' 
		style='margin:4px 67px 4px 80px'
		class='form-control' maxlength='25' value='{{old('minor_title')}}'>
	</div> 

	<div class='input-group input-group-sm' >

	    <textarea id="form[comment][item[body]]" rows='4' cols='40' name='body'
		 placeholder="" required class='form-control text-white' style='margin:4px 0;padding:4px 0;background-color:black;'>{{old('body')}}</textarea>
	</div>
	<div class='input-group input-group-sm' >
		<div class="input-group-append " style="height:30px;">
			<input type='submit' name='submit' class='btn btn-success'>
		</div>
	</div>
    
</form>
