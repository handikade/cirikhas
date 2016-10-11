<div class="modal fade" id="tambah-ekspedisi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Ekspedisi</h4>
            </div>
            {!! Form::open(['url' => 'admin/ekspedisi', 'files' => true]) !!}
            <div class="modal-body">
                <div class="form-group">
                  {!! Form::label('nama', 'Nama Ekspedisi:', ['class' => 'control-label']) !!}
                  {!! Form::text('nama', null, ['class' => 'form-control form-white', 'autofocus' => '']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('logo', 'Logo:') !!}
                  {!! Form::file('logo') !!}
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
