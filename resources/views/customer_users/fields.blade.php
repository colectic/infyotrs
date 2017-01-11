<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Login Field -->
<div class="form-group col-sm-6">
    {!! Form::label('login', 'Login:') !!}
    {!! Form::text('login', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    {!! Form::text('customer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Pw Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pw', 'Pw:') !!}
    {!! Form::text('pw', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

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

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Ext00 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_ext00', 'Email Ext00:') !!}
    {!! Form::text('email_ext00', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Ext01 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_ext01', 'Email Ext01:') !!}
    {!! Form::text('email_ext01', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('customerUsers.index') !!}" class="btn btn-default">Cancel</a>
</div>
