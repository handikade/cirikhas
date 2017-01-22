@if(isset($bank))
  {!! Form::hidden('id', $bank->id) !!}
@endif

<div class="row">
  @if($errors->any())
    <div class="form-group col-md-6 {{ $errors->has('nama') ? 'has-error' : 'has-success'}}">
  @else
    <div class="form-group col-md-6">
  @endif
    {!! Form::label('nama', 'Nama Bank:', ['class' => 'control-label']) !!}
    {!! Form::text('nama', null, ['class' => 'form-control form-white', 'autofocus' => '']) !!}
    @if($errors->has('nama'))
      <span class="help-block">{{ $errors->first('nama') }}</span>
    @endif
  </div>
</div>

<div class="row">
  @if($errors->any())
    <div class="form-group col-md-6 {{ $errors->has('kode_bank') ? 'has-error' : 'has-success'}}">
  @else
    <div class="form-group col-md-6">
  @endif
    {!! Form::label('kode_bank', 'Kode Bank:', ['class' => 'control-label']) !!}
    {!! Form::text('kode_bank', null, ['class' => 'form-control form-white']) !!}
    @if($errors->has('kode_bank'))
      <span class="help-block">{{ $errors->first('kode_bank')}}</span>
    @endif
  </div>
</div>

<div class="row">
  @if($errors->any())
    <div class="form-group col-md-6 {{ $errors->has('nomor_rekening') ? 'has-error' : 'has-success'}}">
  @else
    <div class="form-group col-md-6">
  @endif
    {!! Form::label('nomor_rekening', 'Nomor Rekening:', ['class' => 'control-label']) !!}
    {!! Form::text('nomor_rekening', null, ['class' => 'form-control form-white']) !!}
    @if($errors->has('nomor_rekening'))
      <span class="help-block">{{ $errors->first('nomor_rekening')}}</span>
    @endif

  </div>
</div>

<div class="row">
  @if($errors->any())
    <div class="form-group col-md-6 {{ $errors->has('atas_nama') ? 'has-error' : 'has-success' }}">
  @else
    <div class="form-group col-md-6">
  @endif
    {!! Form::label('atas_nama', 'Atas Nama:', ['class' => 'control-label']) !!}
    {!! Form::text('atas_nama', null, ['class' => 'form-control form-white']) !!}
    @if($errors->has('atas_nama'))
      <span class="help-block">{{ $errors->first('atas_nama') }}</span>
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
    @include('admin.back_button', ['url' => 'admin/bank'])
    </a>
  </div>
</div>
