<form method='post' action='/posts/{post}/comment'>
	@csrf
	@method('post')
	
	@if ($errors->any())
	@include("std.parts.comment_form_errors")
	@endif

	
	<div class='input-group input-group-sm'>

			<label class="input-group-prepend input-group-text">Write a Comment</label>
			<input type='text' name='minor_title' placeholder='title is optional' class='form-control' maxlength='25' value="{{old('minor_title')}}">
	</div> 



	<div class='input-group input-group-sm'>
	<label>
		Sex:
		<input name=sex list=sexes>
	  </label>
	  <datalist id=sexes>
		<label>
		or select from the list:
		<select name=sex>
		  <option value="">
		  <option>Female
		  <option>Male
		</select>
		</label>
	  </datalist>
	</div>


	 <div class='input-group input-group-sm'>
	   <div class='input-group-prepend'>
		   <label class="input-group-text btn btn-success"></label>
		</div>
		<textarea rows='4' cols='40' name='body' placeholder="" required class='form-control'>{{old('body')}}</textarea>
		<div class="input-group-append">
				<input type='submit' name='submit' class=' btn-success'>			
		  </div>
   	   </div>


	</div>
</form>
