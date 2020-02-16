@if($errors->count() != 0)
<div class="alert alert-danger">
    <h4><i class="icon fa fa-ban"></i> Validate error</h4>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif