<div class="modal fade" id="edit-brand-{{ $brand->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Brand</h4>
            </div>
            {!! Form::model($brand, ['method' => 'PATCH', 'action' => ['BrandController@update', $brand->id]]) !!}
            @if(isset($brand))
              {!! Form::hidden('id', $brand->id) !!}
            @endif
            <div class="modal-body">
                <div class="form-group">
                  {!! Form::label('nama', 'Nama Brand:', ['class' => 'control-label']) !!}
                  {!! Form::text('nama', null, ['class' => 'form-control form-white', 'autofocus' => '']) !!}
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
              {!! Form::button('Simpan', ['type' => 'submit', 'class' => 'btn btn-primary waves-effect waves-light']) !!}
            </div>
              {!! Form::close() !!}
        </div>
    </div>
</div>
