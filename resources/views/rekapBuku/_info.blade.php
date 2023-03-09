<!-- modal -->
<div class="modal fade" id="modal_rekap_buku" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 800px">
        <div class="modal-header">
            <h5 class="modal-title">
                {{ trans('rekapBuku.modal_info.modal-title') }}
            </h5>
        </div>
            <div class="modal-body">
            <form style="padding-left: 25px; padding-right: 25px">
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('rekapBuku.form-input.label.library') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="perpus" readonly>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('rekapBuku.form-input.label.title') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="judul" readonly>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('rekapBuku.modal_info.modal-body.label.exemplar') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="eksemplar" readonly>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('rekapBuku.modal_info.modal-body.label.year') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="tahun" readonly>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('rekapBuku.modal_info.modal-body.label.created_at') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="created_at" readonly>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('rekapBuku.modal_info.modal-body.label.updated_at') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="updated_at" readonly>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{ trans('kelolaPerpustakaan.button.close') }}
                </button>
            </div>
        </div>
        </div>
    </div>
    </div>