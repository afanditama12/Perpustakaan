@extends('layouts.dashboard')

@section('title')
    {{ trans('kelolaPerpustakaan.title.index') }}
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('Library') }}
@endsection

@section('content')
    {{-- Awal Content --}}
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-0 font-weight-bold text-primary">{{ trans('kelolaPerpustakaan.table.tablename') }}</h6>
                    </div>
                    <div class="col">
                        <form action="{{ route('listperpustakaan.index') }}" method="GET">
                            <div class="input-group">
                                <input name="keyword" type="text" class="form-control" placeholder="{{ trans('kelolaPerpustakaan.fitur.search') }}"
                                value="{{ request()->get('keyword') }}" id="input" autofocus>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="fa-pull-right pb-3">
                    @can('library_create')
                    <a href="{{ route('listperpustakaan.create') }}" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">
                            {{ trans('kelolaPerpustakaan.button.create') }}
                        </span>
                    </a>
                    @endcan
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" style="width: 100%" cellspacing="0">
                    <thead>
                        <tr >
                        <th scope="col">No</th>
                        <th scope="col">{{ trans('kelolaPerpustakaan.form_control.input.nmlembaga.label') }}</th>
                        <th scope="col">{{ trans('kelolaPerpustakaan.form_control.input.pj.label') }}</th>
                        <th scope="col">{{ trans('kelolaPerpustakaan.form_control.input.jambuka.label') }}</th>
                        <th scope="col">{{ trans('kelolaPerpustakaan.form_control.input.telepon.label') }}</th>
                        <th scope="col">{{ trans('kelolaPerpustakaan.table.aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profiles as $profile)
                            <tr>
                                <td scope="row">{{$loop->iteration + $profiles->firstItem()-1}}</td>
                                <td>{{ $profile->nmlembaga }}</td>
                                <td>{{ $profile->nmpenanggungJawab }}</td>
                                <td>{{ $profile->jambuka }}</td>
                                <td>{{ $profile->telepon }}</td>
                                <td style="width: 160px">
                                    @can('library_detail')
                                    <a href="" class="btn btn-primary" data-target="#modal_info" data-toggle="modal"
                                        data-nmlembaga="{{ $profile->nmlembaga }}"
                                        data-pj="{{ $profile->nmpenanggungJawab }}"
                                        data-pengelola="{{ $profile->nmpengelola }}"
                                        data-alamat="{{ $profile->alamat }}"
                                        data-skp="{{ $profile->skpendirian }}"
                                        data-jambuka="{{ $profile->jambuka }}"
                                        data-telepon="{{ $profile->telepon }}"
                                        data-deskripsi="{{ $profile->deskripsi }}">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    @endcan
                                    @can('library_update')
                                    <a href="{{ route('listperpustakaan.edit', ['listperpustakaan' => $profile]) }}" class="btn btn-info" role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('library_delete')
                                    <form class="d-inline" action="{{ route('listperpustakaan.destroy', ['listperpustakaan' => $profile]) }}" role="alert" method="POST" alert-title="{{ trans('kelolaPerpustakaan.alert.delete.title') }}"
                                    alert-text="{{ trans('kelolaPerpustakaan.alert.delete.message.confirm', ['title' => $profile->nmlembaga]) }}" alert-btn-cancel="{{ trans('kelolaPerpustakaan.button.cancel') }}" 
                                    alert-btn-yes="{{ trans('kelolaPerpustakaan.button.delete') }}">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <div class="fa-pull-right">
                <nav>
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="{{ $profiles->previousPageUrl() }}">
                                {{ trans('kelolaPerpustakaan.pagination.previous') }}
                            </a>
                        </li>
                        <li class="page-item">
                            {{ $profiles->links('pagination::bootstrap-4') }}
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $profiles->nextPageUrl() }}">
                                {{ trans('kelolaPerpustakaan.pagination.next') }}
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div>
                {{ trans('kelolaPerpustakaan.pagination.show') }}
                {{ $profiles->firstItem() }}
                {{ trans('kelolaPerpustakaan.pagination.to') }}
                {{ $profiles->lastItem() }}
                {{ trans('kelolaPerpustakaan.pagination.of') }}
                {{ $profiles->total() }}
                {{ trans('kelolaPerpustakaan.pagination.data') }}
            </div>
            </div>
            </div>
            @include('kelolaPerpustakaan.index.info')
    {{-- Akhir Content  --}}
@endsection

@push('javascript-internal')
    <!-- modal pop up script -->
    <script>
        $('#modal_info').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget)
            var lembaga = button.data('nmlembaga')
            var pj = button.data('pj')
            var pengelola = button.data('pengelola')
            var alamat = button.data('alamat')
            var skp = button.data('skp')
            var jambuka = button.data('jambuka')
            var telepon = button.data('telepon')
            var deskripsi = button.data('deskripsi')

            var modal = $(this)
            modal.find('.modal-body #lembaga').val(lembaga)
            modal.find('.modal-body #pj').val(pj)
            modal.find('.modal-body #pengelola').val(pengelola)
            modal.find('.modal-body #alamat').val(alamat)
            modal.find('.modal-body #skp').val(skp)
            modal.find('.modal-body #jambuka').val(jambuka)
            modal.find('.modal-body #telepon').val(telepon)
            modal.find('.modal-body #deskripsi').val(deskripsi)
            modal.find('.modal-body #skp').val(skp)
            // modal.find('.modal-body #pict').attr("src", "{{url('')}}"+skp )
            // modal.find('.modal-body #link_pict').attr("href", "{{url('')}}"+skp )
        });
        $(document).ready(function(){
            //event : delete list
            $("form[role='alert']").submit(function(event){
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: $(this).attr('alert-btn-cancel'),
                    reverseButtons: true,
                    confirmButtonText: $(this).attr('alert-btn-yes'),
                    }).then((result) => {
                    if (result.isConfirmed) {
                        // todo: process of deleting list
                        event.target.submit();
                    }
                });
            });
        });
        
        // $("#input").on("keyup", function(){
        //     $("tbody tr").filter(function(){
        //         $(this).toggle($(this).text().toLowerCase().indexOf($("#input").val().toLowerCase()) > 1);
        //     });
        // });
    </script>
@endpush