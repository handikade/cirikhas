@if(isset($kategori))
  {!! Form::hidden('id', $kategori->id) !!}
@endif

<div class="row">
  @if($errors->any())
    <div class="form-group col-md-6 {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
  @else
    <div class="form-group col-md-6">
  @endif
    {!! Form::label('nama', 'Nama Kategori:', ['class' => 'control-label']) !!}
    {!! Form::text('nama', null, ['class' => 'form-control form-white', 'autofocus' => '']) !!}
    @if($errors->has('nama'))
      <span class='help-block'>{{ $errors->first('nama') }}</span>
    @endif
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    @include('admin.submit_button')
    @include('admin.back_button', ['url' => 'admin/kategori'])
  </div>
</div>
