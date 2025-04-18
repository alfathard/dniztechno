@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="container-fluid">
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    </div>
    @endforeach
@endif

@if(session('success'))
<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
</div>
@endif

@if(session('error'))
<div class="container-fluid">
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
</div>
@endif