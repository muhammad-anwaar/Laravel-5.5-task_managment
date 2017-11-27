@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-7 col-lg-7 col-md-offset-2">
<div class="panel panel-default">
  <div class="panel-heading">All Tasks <a class="pull-right btn btn-success btn-sm" href="/task/create">Add Task</a></div>
  <div class="panel-body">
         
        <ul class="list-group">
            @foreach($tasks as $value)
          <li class="list-group-item "><a href="/task/ {{ $value->id }}"> {{ $value->task_name }} </a> 
              <span class="pull-right">
                  <a href="/task/{{ $value->id }}/edit">Edit</a> | 
                  <form style="display: inline;" id="delete_form" action="{{ route('task.destroy', [$value->id]) }}" method="post">
                    <a href="javascript:void(0);" onclick="document.getElementById('delete_form').submit();">Delete</a>
                     
                     {{csrf_field()}}
                     <input type="hidden" name="_method" value="delete">

                     </form>
              </span></li>
            @endforeach
        </ul>

       


  </div>
</div>
</div>
</div>
@endsection