<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Document Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_type', 'Document Type:') !!}
    {!! Form::text('document_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Document Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_number', 'Document Number:') !!}
    {!! Form::text('document_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Driving License Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('driving_license_id', 'Driving License Id:') !!}
    {!! Form::text('driving_license_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Rh Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rh', 'Rh:') !!}
    {!! Form::text('rh', null, ['class' => 'form-control']) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::text('photo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('drivers.index') !!}" class="btn btn-default">Cancel</a>
</div>
