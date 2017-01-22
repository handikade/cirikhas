@if(isset($produk))
  {!! Form::hidden('id', $produk->id) !!}
@endif

<div class="row">
  @if($errors->any())
  <div class="form-group col-md-6 {{ $errors->has('nama') ? 'has-error' : 'has-success' }}">
  @else
  <div class="form-group col-md-6">
  @endif
    {!! Form::label('nama', 'Nama:', ['class' => 'control-label']) !!}
    {!! Form::text('nama', null, ['class' => 'form-control form-white', 'autofocus' => '']) !!}
    @if($errors->has('nama'))
      <span class="help-block">{{ $errors->first('nama') }} </span>
    @endif
  </div>

  @if($errors->any())
  <div class="form-group col-md-6 {{ $errors->has('bahan') ? 'has-error' : 'has-success' }}">
  @else
  <div class="form-group col-md-6">
  @endif
    {!! Form::label('bahan', 'Bahan:', ['class' => 'control-label']) !!}
    {!! Form::text('bahan', null, ['class' => 'form-control form-white']) !!}
    @if($errors->has('bahan'))
      <span class="help-block">{{ $errors->first('bahan') }} </span>
    @endif
  </div>
</div>

<div class="row">
  @if($errors->any())
  <div class="form-group col-md-6 {{ $errors->has('perawatan') ? 'has-error' : 'has-success' }}">
  @else
  <div class="form-group col-md-6">
  @endif
    {!! Form::label('perawatan', 'Perawatan:', ['class' => 'control-label']) !!}
    {!! Form::textarea('perawatan', null, ['class' => 'form-control', 'rows' => 3]) !!}
    @if($errors->has('perawatan'))
      <span class="help-block">{{ $errors->first('perawatan') }} </span>
    @endif
  </div>

  @if($errors->any())
  <div class="form-group col-md-6 {{ $errors->has('deskripsi') ? 'has-error' : 'has-success' }}">
  @else
  <div class="form-group col-md-6">
  @endif
    {!! Form::label('deskripsi', 'Deskripsi:', ['class' => 'control-label']) !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'rows' => 3]) !!}
    @if($errors->has('deskripsi'))
      <span class="help-block">{{ $errors->first('deskripsi') }} </span>
    @endif
  </div>
</div>

<div class="row">
  @if($errors->any())
  <div class="form-group col-md-6 {{ $errors->has('harga') ? 'has-error' : 'has-success' }}">
  @else
  <div class="form-group col-md-6">
  @endif
    {!! Form::label('harga', 'Harga:', ['class' => 'control-label']) !!}
    <div class="input-group">
      <span class="input-group-addon">Rp</span>
      {!! Form::number('harga', null, ['class' => 'form-control form-white']) !!}
    </div>
    @if($errors->has('harga'))
      <span class="help-block">{{ $errors->first('harga') }} </span>
    @endif
  </div>

  @if($errors->any())
  <div class="form-group col-md-6 {{ $errors->has('diskon') ? 'has-error' : 'has-success' }}">
  @else
  <div class="form-group col-md-6">
  @endif
    {!! Form::label('diskon', 'Diskon: (isi dengan 0 bila tidak ada diskon)', ['class' => 'control-label']) !!}
    <div class="input-group">
      {!! Form::number('diskon', 0, ['class' => 'form-control form-white']) !!}
      <span class="input-group-addon">%</span>
    </div>
    @if($errors->has('diskon'))
      <span class="help-block">{{ $errors->first('diskon') }} </span>
    @endif
  </div>
</div>

<div class="row">
  <div class="form-group col-md-6" style="max-height:250px; overflow-y: scroll;">
    {!! Form::label('kategori_produk', 'Kategori:', ['class' => 'control-label']) !!}<br>
    @if(count($list_kategori) > 0)
    <table class="table table-striped table-bordered">
          @foreach($list_kategori as $key => $value)
          <tr>
            <td>
              <div class="checkbox checkbox-primary">
                {!! Form::checkbox('kategori_produk[]', $key ) !!}
                <label>
                  {{ $value }}
                </label>
              </div>
            </td>
          </tr>
          @endforeach
    </table>
    @else
    <p>Tidak ada pilihan kategori. Silahkan <a href="{{ url('admin/kategori') }}">buat</a></p>
    @endif
  </div>

  <div class="form-group col-md-6">
    {!! Form::label('brand_id', 'Brand:', ['class' => 'control-label']) !!}
    @if(count($list_brand) > 0)
    {!! Form::select('brand_id', $list_brand, null, ['class' => 'form-control', 'id' => 'brand_id']) !!}
    @else
      <p>Tidak ada pilihan brand. Silahkan <a href="{{ url('admin/brand') }}">buat</a></p>
    @endif
  </div>
</div>

<div class="row">
  <div class="form-group col-md-6">
    <label class="btn btn-default btn-file">
      Foto utama <input type="file" name="foto_utama" style="display: none;">
    </label>
    <label class="btn btn-default btn-file">
      Foto 1 <input type="file" name="foto_satu" style="display: none;">
    </label>
    <label class="btn btn-default btn-file">
      Foto 2 <input type="file" name="foto_dua" style="display: none;">
    </label>
    <label class="btn btn-default btn-file">
      Foto 3 <input type="file" name="foto_tiga" style="display: none;">
    </label>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    @include('admin.submit_button')
    @include('admin.back_button', ['url' => 'admin/produk'])
  </div>
</div>
