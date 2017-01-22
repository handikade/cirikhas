<!-- Modal Edit Kategori -->
<div class="modal fade" id="edit-kategori-{{ $i }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Kategori</h4>
      </div>
      {!! Form::model($kategori, ['method' => 'PATCH', 'action' => ['KategoriController@update', $kategori->id]]) !!}
        @if (isset($kategori))
          {!! Form::hidden('id', $kategori->id) !!}
        @endif
      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('nama', 'Nama Kategori:', ['class' => 'control-label']) !!}
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
<!-- END MODAL -->
