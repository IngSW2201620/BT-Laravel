<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $passenger->id !!}</p>
</div>

<!-- Balance Field -->
<div class="form-group">
    {!! Form::label('balance', 'Balance:') !!}
    <p>{!! $passenger->balance !!}</p>
</div>

<!-- User Field -->
<div class="form-group">
    {!! Form::label('user', 'User:') !!}
    <p>{!! $passenger->user !!}</p>
</div>

<!-- Ticket Field -->
<div class="form-group">
    {!! Form::label('ticket', 'Ticket:') !!}
    <p>{!! $passenger->ticket !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $passenger->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $passenger->updated_at !!}</p>
</div>

