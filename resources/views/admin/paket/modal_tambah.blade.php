<div class="modal fade" id="tambah-paket">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Bank</h4>
            </div>
            {!! Form::open(['url' => 'admin/paket']) !!}
            <div class="modal-body">
                <div class="form-group">
                  {!! Form::label('nama', 'Nama Paket:', ['class' => 'control-label']) !!}
                  {!! Form::text('nama', null, ['class' => 'form-control form-white', 'autofocus' => '']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('ongkos_kirim', 'Ongkos Kirim:', ['class' => 'control-label']) !!}
                  {!! Form::number('ongkos_kirim', null, ['class' => 'form-control form-white']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('ekspedisi_id', 'Ekspedisi:', ['class' => 'control-label']) !!}
                  {!! Form::select('ekspedisi_id', $list_ekspedisi, null, ['class' => 'form-control']) !!}
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
