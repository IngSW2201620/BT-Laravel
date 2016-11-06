<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $roads->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $roads->name !!}</p>
</div>

<!-- Id Source Stop Field -->
<div class="form-group">
    {!! Form::label('id_source_stop', 'Id Source Stop:') !!}
    <p>{!! $roads->id_source_stop !!}</p>
</div>

<!-- Id Destination Stop Field -->
<div class="form-group">
    {!! Form::label('id_destination_stop', 'Id Destination Stop:') !!}
    <p>{!! $roads->id_destination_stop !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $roads->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $roads->updated_at !!}</p>
</div>

