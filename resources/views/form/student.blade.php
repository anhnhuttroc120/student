<div class="form-group">
  {!! Form::label('name', 'Name') !!}
  <div class="form-controls">
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('date_of_birth', 'Date Of Birth') !!}
  <div class="form-controls">
    {!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('class_id', 'Trường') !!}
  <div class="form-controls">
    {!! Form::select('class_id', $schools, null, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="form-group">
  {!! Form::label('address', 'Địa chỉ') !!}
  <div class="form-controls">
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
  </div>
</div>


