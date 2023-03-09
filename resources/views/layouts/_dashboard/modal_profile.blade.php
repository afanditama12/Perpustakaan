<!-- modal -->
<div class="modal fade" id="modal_profile" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row align-content-center"">
                    <div class="col-3"></div>
                    <div class="col-6 text-center">
                        <h3>My Profiles</h3>
                        <img class="img-profile rounded-circle"
                        src="{{ asset('vendor/img/undraw_profile.svg') }}" style="width: 50%" height="50%">
                        <p><strong>{{ Auth::user()->name }}</strong> - {{ Auth::user()->roles->first()->name }} <br>
                        terdaftar sejak {{ Auth::user()->created_at}}</p>
                        
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>