<!-- Costumer User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('costumer_user', 'Costumer User:') !!}
    {!! Form::text('costumer_user', null, ['class' => 'form-control']) !!}
</div>

<!-- Costumer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('costumer_id', 'Costumer Id:') !!}
    {!! Form::text('costumer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Subject Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject', 'Subject:') !!}
    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tickets.index') !!}" class="btn btn-default">Cancel</a>
</div>
