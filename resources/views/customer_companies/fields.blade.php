<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    {!! Form::text('customer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Cif Field -->
<div class="form-group col-sm-6">
    {!! Form::label('CIF', 'Cif:') !!}
    {!! Form::text('CIF', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Comarca Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comarca', 'Comarca:') !!}
    {!! Form::text('comarca', null, ['class' => 'form-control']) !!}
</div>

<!-- Provincia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provincia', 'Provincia:') !!}
    {!! Form::text('provincia', null, ['class' => 'form-control']) !!}
</div>

<!-- Ambit Actuacio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ambit_actuacio', 'Ambit Actuacio:') !!}
    {!! Form::text('ambit_actuacio', null, ['class' => 'form-control']) !!}
</div>

<!-- Forma Juridica Field -->
<div class="form-group col-sm-6">
    {!! Form::label('forma_juridica', 'Forma Juridica:') !!}
    {!! Form::text('forma_juridica', null, ['class' => 'form-control']) !!}
</div>

<!-- Via Coneixement Field -->
<div class="form-group col-sm-6">
    {!! Form::label('via_coneixement', 'Via Coneixement:') !!}
    {!! Form::text('via_coneixement', null, ['class' => 'form-control']) !!}
</div>

<!-- Comments Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comments', 'Comments:') !!}
    {!! Form::text('comments', null, ['class' => 'form-control']) !!}
</div>

<!-- Valid Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('valid_id', 'Valid Id:') !!}
    <label class="radio-inline">
        {!! Form::radio('valid_id', "1", null) !!} 1
    </label>
    <label class="radio-inline">
        {!! Form::radio('valid_id', "0", null) !!} 0
    </label>
</div>

<!-- Create Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('create_time', 'Create Time:') !!}
    {!! Form::date('create_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Create By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('create_by', 'Create By:') !!}
    {!! Form::text('create_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Change Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('change_time', 'Change Time:') !!}
    {!! Form::date('change_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Change By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('change_by', 'Change By:') !!}
    {!! Form::text('change_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('customerCompanies.index') !!}" class="btn btn-default">Cancel</a>
</div>
