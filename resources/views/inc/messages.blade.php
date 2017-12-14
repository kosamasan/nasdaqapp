<div class="col-md-6 col-md-offset-2 col-lg-6 col-lg-offset-3">
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
</div>