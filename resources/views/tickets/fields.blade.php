<!-- Used Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('used_date', 'Used Date:') !!}
    {!! Form::date('used_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Expiration Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expiration_date', 'Expiration Date:') !!}
    {!! Form::date('expiration_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tickets.index') !!}" class="btn btn-default">Cancel</a>
</div>
