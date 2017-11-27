@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-7 col-lg-7 col-md-offset-2">
    
    <h2>Add New Task</h2>

	<form class="form-group" method="post" action="{{ route('task.store') }}">
		{{ csrf_field() }}

      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
	  <div class="form-group">
	    <label class="sr-only" for="task_name">Task Name </label> 
	    <input type="text" class="form-control" id="task_name" name="task_name" value="" required="required" >
	  </div>
	  <div class="form-group">
	    <label class="sr-only" for="pwd">Disciption:</label>
	    <textarea class="form-control" name="task_description" rows="6" placeholder="Enter ..." required="required"  ></textarea>
	  </div>
	  
	  <button type="submit" class="btn btn-success">Create</button>
	</form>

	</div>
</div>
@endsection