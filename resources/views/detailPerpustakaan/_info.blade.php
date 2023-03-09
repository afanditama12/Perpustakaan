<!-- modal -->
<div class="modal fade" id="modal_rekap_bulanan" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 800px">
        <div class="modal-header">
            <h5 class="modal-title">
                {{ trans('detailPerpustakaan.modal_info.modal-title') }}
            </h5>
        </div>
            <div class="modal-body">
            <form style="padding-left: 25px; padding-right: 25px">
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('detailPerpustakaan.form-input.label.library') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="perpus" readonly>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('detailPerpustakaan.form-input.label.visitor') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="pengunjung" readonly>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('detailPerpustakaan.modal_info.modal-body.label.member') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="member" readonly>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('detailPerpustakaan.modal_info.modal-body.label.borrower') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="peminjaman" readonly>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('detailPerpustakaan.modal_info.modal-body.label.title_book') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="judul" readonly>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('detailPerpustakaan.modal_info.modal-body.label.eksemplar') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="eksemplar" readonly>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-3">
                        {{ trans('detailPerpustakaan.modal_info.modal-body.label.year') }}
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="tahun" readonly>
                    </div>
                </div>
                <br>
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