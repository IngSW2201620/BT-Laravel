<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tickets->id !!}</p>
</div>

<!-- Id Owner Field -->
<div class="form-group">
    {!! Form::label('id_owner', 'Id Owner:') !!}
    <p>{!! $tickets->id_owner !!}</p>
</div>

<!-- Id Reserved Route Field -->
<div class="form-group">
    {!! Form::label('id_reserved_route', 'Id Reserved Route:') !!}
    <p>{!! $tickets->id_reserved_route !!}</p>
</div>

<!-- Id Used Route Field -->
<div class="form-group">
    {!! Form::label('id_used_route', 'Id Used Route:') !!}
    <p>{!! $tickets->id_used_route !!}</p>
</div>

<!-- Id Used Stop Field -->
<div class="form-group">
    {!! Form::label('id_used_stop', 'Id Used Stop:') !!}
    <p>{!! $tickets->id_used_stop !!}</p>
</div>

<!-- Used Date Field -->
<div class="form-group">
    {!! Form::label('used_date', 'Used Date:') !!}
    <p>{!! $tickets->used_date !!}</p>
</div>

<!-- Expiration Date Field -->
<div class="form-group">
    {!! Form::label('expiration_date', 'Expiration Date:') !!}
    <p>{!! $tickets->expiration_date !!}</p>
</div>

<!-- Id Seller Field -->
<div class="form-group">
    {!! Form::label('id_seller', 'Id Seller:') !!}
    <p>{!! $tickets->id_seller !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tickets->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tickets->updated_at !!}</p>
</div>

