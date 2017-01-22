@if(isset($voucher))
  {!! Form::hidden('id', $voucher->id) !!}
@endif

<div class="row">
  <div class="col-md-4">
    <label class="control-label">Sasaran Voucher:</label><br>
  </div>
</div>

<div class="row">
  @if($errors->any())
  <div class="form-group col-md-12 {{ $errors->has('sasaran') ? 'has-error' : 'has-success' }}">
  @else
  <div class="form-group col-md-12">
  @endif
    <label class="radio-inline">
      {!! Form::radio('sasaran', 'harga_produk', true) !!} Harga Produk
    </label>
    <label class="radio-inline">
      {!! Form::radio('sasaran', 'ongkos_kirim') !!} Ongkos Kirim
    </label>
  </div>
</div>

<div class="row">
  @if($errors->any())
  <div class="form-group col-md-4 {{ $errors->has('kode') ? 'has-error' : 'has-success' }}">
  @else
  <div class="form-group col-md-4">
  @endif
    <label class="control-label" for="kode">Kode:</label>
    {!! Form::text('kode', null, ['class' => 'form-white form-control', 'autofocus' => '']) !!}
    @if ($errors->has('kode'))
        <span class="help-block">{{ $errors->first('kode') }}</span>
    @endif
  </div>
  @if($errors->any())
  <div class="form-group col-md-4 {{ $errors->has('mulai') ? 'has-error' : 'has-success' }}">
  @else
  <div class="form-group col-md-4">
  @endif
    <label class="control-label" for="mulai">Mulai:</label>
    {!! Form::date('mulai', null, ['class' => 'form-control form-white']) !!}
    @if ($errors->has('mulai'))
        <span class="help-block">{{ $errors->first('mulai') }}</span>
    @endif
  </div>
  @if($errors->any())
  <div class="form-group col-md-4 {{ $errors->has('berakhir') ? 'has-error' : 'has-success' }}">
  @else
  <div class="form-group col-md-4">
  @endif
    {!! Form::label('berakhir', 'Berakhir:', ['class' => 'control-label']) !!}
    {!! Form::date('berakhir', null, ['class' => 'form-control form-white']) !!}
    @if ($errors->has('berakhir'))
        <span class="help-block">{{ $errors->first('berakhir') }}</span>
    @endif
  </div>
</div>

<div class="row">
  <div class=col-md-4>
    <label class="control-label">Tipe Voucher:</label><br>
  </div>
</div>

<div class="row">
  @if($errors->any())
  <div class="form-group col-md-4 {{ $errors->has('tipe') ? 'has-error' : 'has-success' }}">
  @else
  <div class="form-group col-md-4">
  @endif
    <label class="radio-inline">
      {!! Form::radio('tipe', 'nominal', true, ['id' => 'nominal-radio']) !!} Potongan Harga
    </label>
    <div class="input-group" id="nominal-form">
      <span class="input-group-addon">Rp</span>
      {!! Form::number('nominal', null, ['class' => 'form-control form-white']) !!}
    </div>
  </div>

  @if($errors->any())
  <div class="form-group col-md-4 {{ $errors->has('tipe') ? 'has-error' : 'has-success' }}">
  @else
  <div class="form-group col-md-4">
  @endif
    <label class="radio-inline">
      {!! Form::radio('tipe', 'persentase', false, ['id' => 'persentase-radio']) !!} Diskon
    </label>
    <div class="input-group" id="persentase-form">
      {!! Form::number('persentase', null, ['class' => 'form-control form-white', 'id' => 'persentase-form']) !!}
      <span class="input-group-addon">%</span>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    @include('admin.submit_button')
    @include('admin.back_button', ['url' => 'admin/voucher'])
  </div>
</div>

<script>
if(document.getElementById('nominal-radio').checked) {
  $('#persentase-form').hide(100);
}

else if(document.getElementById('persentase-radio').checked) {
  $('#nominal-form').hide(100);
}

  $('#persentase-radio').click(function() {
    $('#persentase-form').show(200);
    $('#nominal-form').hide(200);
  });

  $('#nominal-radio').click(function() {
    $('#persentase-form').hide(200);
    $('#nominal-form').show(200);
  });
</script>
