<!-- Modal Tambah Slider -->
<div class="modal fade" id="tambah-slider">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Slider</h4>
      </div>
      {!! Form::open(['url' => 'admin/slider', 'files' => 'true']) !!}
      <div class="modal-body">
        <div class="form-group">
          <label class="btn btn-default btn-file">
            Slider <input type="file" name="slider" style="display: none;">
          </label>
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
