@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-7 col-lg-7 col-md-offset-2">
    
    <h2>Update Task</h2>

	<form class="form-group" method="post" action="{{ route('task.update', [$task->id]) }}">
		{{ csrf_field() }}
         
         <input type="hidden" name="_method" value="put">

	  <div class="form-group">
	    <label class="sr-only" for="task_name">Task Name</label> 
	    <input type="text" class="form-control" id="task_name" name="task_name" value="{{ $task->task_name }}">
	  </div>
	  <div class="form-group">
	    <label class="sr-only" for="pwd">Disciption:</label>
	    <textarea class="form-control" name="task_description" rows="6" placeholder="Enter ..."  >{{ $task->task_description }}</textarea>
	  </div>
	  
	  <button type="submit" class="btn btn-primary">Update</button>
	</form>

	</div>
</div>
@endsection