<div class="modal fade" id="tambah-brand">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Brand</h4>
            </div>
            {!! Form::open(['url' => 'admin/brand']) !!}
              @include('admin.brand.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
