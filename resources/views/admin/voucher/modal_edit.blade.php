<!-- Modal Edit Voucher -->
<div class="modal fade" id="edit-voucher-{{ $i }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Voucher</h4>
      </div>
      {!! Form::model($voucher, ['method' => 'PATCH', 'action' => ['VoucherController@update', $voucher->id]]) !!}
        @if (isset($voucher))
          {!! Form::hidden('id', $voucher->id) !!}
        @endif
      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('kode', 'Kode Voucher:', ['class' => 'control-label']) !!}
          {!! Form::text('kode', null, ['class' => 'form-control form-white', 'autofocus' => '']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('mulai', 'Mulai:', ['class' => 'control-label']) !!}
          {!! Form::date('mulai', null, ['class' => 'form-control form-white']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('berakhir', 'Berakhir:', ['class' => 'control-label']) !!}
          {!! Form::date('berakhir', null, ['class' => 'form-control form-white']) !!}
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
