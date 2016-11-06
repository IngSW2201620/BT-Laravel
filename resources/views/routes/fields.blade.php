<!-- Schedule Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('schedule_time', 'Schedule Time:') !!}
    {!! Form::date('schedule_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Stardate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('starDate', 'Stardate:') !!}
    {!! Form::date('starDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Enddate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endDate', 'Enddate:') !!}
    {!! Form::date('endDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('routes.index') !!}" class="btn btn-default">Cancel</a>
</div>
