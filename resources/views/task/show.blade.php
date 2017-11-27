@extends('layouts.app')
@section('content')
<div class="row">
 <div class="col-md-8 col-lg-8 col-md-offset-2">
  <div class="container">
        <h1 class="display-3">{{ $task[0]->task_name }}</h1>
        <p>{{ $task[0]->task_description }}</p>
        
    </div>
  </div>
</div>
@endsection