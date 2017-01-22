@if(isset($admin))
  {!! Form::hidden('id', $admin->id) !!}
@endif

<div class="row">
  @if($errors->any())
  <div class="col-md-6 form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
  @else
  <div class="col-md-6 form-group">
  @endif
    {!! Form::label('nama', 'Nama Admin:', ['class' => 'control-label']) !!}
    {!! Form::text('nama', null, ['class' => 'form-control form-white', 'autofocus' => '']) !!}
    @if($errors->has('nama'))
    <span class="help-block">{{ $errors->first('nama') }}</span>
    @endif
  </div>
</div>

<div class="row">
  @if($errors->any())
  <div class="col-md-6 form-group {{ $errors->has('username') ? 'has-error' : 'has-success' }}">
  @else
  <div class="col-md-6 form-group">
  @endif
    {!! Form::label('username', 'Username Admin:', ['class' => 'control-label']) !!}
    {!! Form::text('username', null, ['class' => 'form-control form-white']) !!}
    @if($errors->has('username'))
    <span class="help-block">{{ $errors->first('username') }}</span>
    @endif
  </div>
</div>

<div class="row">
  @if($errors->any())
  <div class="col-md-6 form-group {{ $errors->has('password') ? 'has-error' : 'has-success' }}">
  @else
  <div class="col-md-6 form-group">
  @endif
    {!! Form::label('password', 'Password Admin:', ['class' => 'control-label']) !!}
    {!! Form::text('password', null, ['class' => 'form-control form-white']) !!}
    @if($errors->has('password'))
    <span class="help-block">{{ $errors->first('password') }}</span>
    @endif
  </div>
</div>

<div class="row">
  @if($errors->any())
  <div class="col-md-6 form-group {{ $errors->has('level') ? 'has-error' : 'has-success' }}">
  @else
  <div class="col-md-6 form-group">
  @endif
    {!! Form::label('level', 'Level Admin:', ['class' => 'control-label']) !!}
    {!! Form::select('level', ['0' => 'Super Admin', '1' => 'Admin Toko', '2' => 'Admin Penjualan'], '1', ['class' => 'form-control']) !!}
    @if($errors->has('level'))
    <span class="help-block">{{ $errors->first('level') }}</span>
    @endif
  </div>
</div>

<div class="row">
  @if($errors->any())
    <div class="form-group col-md-6 {{ $errors->has('logo') ? 'has-error' : 'has-success'}}">
  @else
    <div class="form-group col-md-6">
  @endif
    {!! Form::label('logo', 'Logo:') !!}
    {!! Form::file('logo') !!}
    @if($errors->has('logo'))
      <span class="help-block">{{ $errors->first('logo') }}</span>
    @endif
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    @include('admin.submit_button')
    @include('admin.back_button', ['url' => 'admin/admin'])
  </div>
</div>
