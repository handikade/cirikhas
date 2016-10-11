<div class="modal fade" id="tambah-bank">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Bank</h4>
            </div>
            {!! Form::open(['url' => 'admin/bank', 'files' => 'true']) !!}
            <div class="modal-body">
                <div class="form-group">
                  {!! Form::label('nama', 'Nama Bank:', ['class' => 'control-label']) !!}
                  {!! Form::text('nama', null, ['class' => 'form-control form-white', 'autofocus' => '']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('nomor_rekening', 'Nomor Rekening:', ['class' => 'control-label']) !!}
                  {!! Form::text('nomor_rekening', null, ['class' => 'form-control form-white']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('atas_nama', 'Atas Nama:', ['class' => 'control-label']) !!}
                  {!! Form::text('atas_nama', null, ['class' => 'form-control form-white']) !!}
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
