<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $ticket->id !!}</p>
</div>

<!-- Costumer User Field -->
<div class="form-group">
    {!! Form::label('costumer_user', 'Costumer User:') !!}
    <p>{!! $ticket->costumer_user !!}</p>
</div>

<!-- Costumer Id Field -->
<div class="form-group">
    {!! Form::label('costumer_id', 'Costumer Id:') !!}
    <p>{!! $ticket->costumer_id !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $ticket->type !!}</p>
</div>

<!-- Subject Field -->
<div class="form-group">
    {!! Form::label('subject', 'Subject:') !!}
    <p>{!! $ticket->subject !!}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    <p>{!! $ticket->body !!}</p>
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

