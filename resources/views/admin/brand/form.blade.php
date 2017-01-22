@if(isset($brand))
  {!! Form::hidden('id', $brand->id) !!}
@endif

<div class="row">
  @if($errors->any())
  <div class="col-md-6 form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
  @else
  <div class="col-md-6 form-group">
  @endif
    {!! Form::label('nama', 'Nama Brand:', ['class' => 'control-label']) !!}
    {!! Form::text('nama', null, ['class' => 'form-control form-white', 'autofocus' => '']) !!}
    @if($errors->has('nama'))
    <span class="help-block">{{ $errors->first('nama') }}</span>
    @endif
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    @include('admin.submit_button')
    @include('admin.back_button', ['url' => 'admin/brand'])
  </div>
</div>
