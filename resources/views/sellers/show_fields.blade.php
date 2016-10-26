<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $seller->id !!}</p>
</div>

<!-- Firstname Field -->
<div class="form-group">
    {!! Form::label('firstName', 'Firstname:') !!}
    <p>{!! $seller->firstName !!}</p>
</div>

<!-- Lastname Field -->
<div class="form-group">
    {!! Form::label('lastName', 'Lastname:') !!}
    <p>{!! $seller->lastName !!}</p>
</div>

<!-- Idticket Field -->
<div class="form-group">
    {!! Form::label('idTicket', 'Idticket:') !!}
    <p>{!! $seller->idTicket !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $seller->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $seller->updated_at !!}</p>
</div>

