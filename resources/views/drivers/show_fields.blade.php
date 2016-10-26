<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $driver->id !!}</p>
</div>

<!-- Firstname Field -->
<div class="form-group">
    {!! Form::label('firstName', 'Firstname:') !!}
    <p>{!! $driver->firstName !!}</p>
</div>

<!-- Lastname Field -->
<div class="form-group">
    {!! Form::label('lastName', 'Lastname:') !!}
    <p>{!! $driver->lastName !!}</p>
</div>

<!-- Photo Field -->
<div class="form-group">
    {!! Form::label('photo', 'Photo:') !!}
    <p>{!! $driver->photo !!}</p>
</div>

<!-- Administrator Field -->
<div class="form-group">
    {!! Form::label('administrator', 'Administrator:') !!}
    <p>{!! $driver->administrator !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $driver->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $driver->updated_at !!}</p>
</div>

