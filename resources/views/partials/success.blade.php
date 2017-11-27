@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>{!! session()->get('success') !!}</strong> 
</div>
@endif


@if(session()->has('error'))
<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>{!! session()->get('error') !!}</strong> 
</div>
@endif