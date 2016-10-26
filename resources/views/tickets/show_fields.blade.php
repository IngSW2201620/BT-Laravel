<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $ticket->id !!}</p>
</div>

<!-- Purchasedate Field -->
<div class="form-group">
    {!! Form::label('purchaseDate', 'Purchasedate:') !!}
    <p>{!! $ticket->purchaseDate !!}</p>
</div>

<!-- Expirationdate Field -->
<div class="form-group">
    {!! Form::label('expirationDate', 'Expirationdate:') !!}
    <p>{!! $ticket->expirationDate !!}</p>
</div>

<!-- Ustedate Field -->
<div class="form-group">
    {!! Form::label('usteDate', 'Ustedate:') !!}
    <p>{!! $ticket->usteDate !!}</p>
</div>

<!-- Datereservation Field -->
<div class="form-group">
    {!! Form::label('dateReservation', 'Datereservation:') !!}
    <p>{!! $ticket->dateReservation !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $ticket->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $ticket->updated_at !!}</p>
</div>

