<!-- modal -->
<div class="modal fade" id="modal_info" role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 800px">
    <div class="modal-header">
        <h5 class="modal-title">{{ trans('kelolaPerpustakaan.table.modaltitle') }}</h5>
    </div>
        <div class="modal-body">
        <form style="padding-left: 25px; padding-right: 25px">
            <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.nmlembaga.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control" id="lembaga" readonly>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.pj.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control" id="pj" readonly>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.pengelola.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control" id="pengelola" readonly>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.telepon.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control" id="telepon" readonly>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.skp.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control" id="skp" readonly>
                </div>
                {{-- <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.skp.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <a id="link_pict" href="" target="_blank" rel="noopener noreferrer">
                        <img id="pict" src="" alt="{{ asset('vendor/img/notfound.png') }}" style="width: 100px; height: 100px;">
                    </a>
                </div> --}}
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.jambuka.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control" id="jambuka" readonly>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.alamat.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <textarea type="text" class="form-control" id="alamat" readonly></textarea>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.deskripsi.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <textarea type="text" class="form-control" id="deskripsi" readonly></textarea>
                </div>
            </div>
            <br>
        </form>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('kelolaPerpustakaan.button.close') }}</button>
        </div>
    </div>
    </div>
</div>
</div>