@extends('layouts.dashboard')

@section('title')
    {{ trans('detailPerpustakaan.title.index') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('recap_list') }}
@endsection

@section('content')
    {{-- Awal Content --}}
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row align-items-center border">
                    <div class="col-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ trans('detailPerpustakaan.table.tableName') }}
                        </h6>
                    </div>
                    <div class="col-5 mt-3">
                        <form action="{{ route('detail-perpustakaan.index') }}" method="GET">
                            <div class="input-group">
                                <select id="select_perpus" name="filter"
                                    data-placeholder="{{ trans('detailPerpustakaan.form-input.placeholder.library') }}"
                                    class="form-control">
                                    @if (request()->get('filter'))
                                        <option value="{{ $filter->id }}" selected>
                                            {{ $filter->nmlembaga }}
                                        </option>
                                    @endif
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-filter"></i>
                                    Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-4">
                        <div class="fa-pull-right">
                            <a href="" data-target="#modal_export" data-toggle="modal" class="btn btn-secondary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-file-export"></i>
                                </span>
                                <span class="text">
                                    {{ trans('detailPerpustakaan.button.export') }}
                                </span>
                            </a>
                            @can('data_create')
                            <a href="{{ route('detail-perpustakaan.create') }}" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">
                                    {{ trans('detailPerpustakaan.button.add') }}
                                </span>
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="DataTable" style="width: 100%" cellspacing="0">
                        <thead>
                            <tr >
                            <th scope="col">No</th>
                            <th scope="col">
                                {{ trans('detailPerpustakaan.table.library') }}
                            </th>
                            <th scope="col">
                                {{ trans('detailPerpustakaan.table.visitor') }}
                            </th>
                            <th scope="col">
                                {{ trans('detailPerpustakaan.table.member') }}
                            </th>
                            <th scope="col">
                                {{ trans('detailPerpustakaan.table.borrower') }}
                            </th>
                            <th scope="col">
                                {{ trans('detailPerpustakaan.table.title_book') }}
                            </th>
                            <th scope="col">
                                {{ trans('detailPerpustakaan.table.eksemplar') }} 
                            </th>
                            <th scope="col">
                                {{ trans('detailPerpustakaan.table.year') }}
                            </th>
                            <th scope="col">
                                {{ trans('detailPerpustakaan.table.action') }}
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_perpus as $dp)
                            <tr>
                                <td scope="row">{{$loop->iteration + $detail_perpus->firstItem()-1}}</td>
                                <td>{{ $dp->profil->nmlembaga }}</td>
                                <td>{{ $dp->pengunjung }}</td>
                                <td>{{ $dp->member }}</td>
                                <td>{{ $dp->peminjaman }}</td>
                                <td>{{ $dp->judul }}</td>
                                <td>{{ $dp->eksemplar }}</td>
                                <td>{{ $dp->tahun }}</td>
                                <td style="width: 154px">
                                    @can('data_detail')   
                                    <a href="" class="btn btn-primary" data-target="#modal_rekap_bulanan"
                                    data-toggle="modal" data-nmlembaga="{{ $dp->profil->nmlembaga }}" data-pengunjung="{{ $dp->pengunjung }}" 
                                    data-member="{{ $dp->member }}" data-peminjaman="{{ $dp->peminjaman }}" data-judul="{{ $dp->judul }}" 
                                    data-eksemplar="{{ $dp->eksemplar }}" data-tahun="{{ $dp->tahun }}" data-created_at="{{ $dp->created_at }}" 
                                    data-updated_at="{{ $dp->updated_at }}">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    @endcan
                                    @can('data_update')   
                                    <a href="{{ route('detail-perpustakaan.edit', ['detail_perpustakaan' => $dp]) }}" 
                                        class="btn btn-info" role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('data_delete')   
                                    <form class="d-inline" action="{{ route('detail-perpustakaan.destroy', ['detail_perpustakaan' => $dp]) }}" 
                                        role="alert" method="POST" alert-title="{{ trans('detailPerpustakaan.alert.delete.title') }}"
                                        alert-text="{{ trans('detailPerpustakaan.alert.delete.message.confirm', ['title' => $dp->tahun, 'time' => $dp->created_at]) }}" 
                                        alert-btn-cancel="{{ trans('detailPerpustakaan.button.cancel') }}" 
                                        alert-btn-yes="{{ trans('detailPerpustakaan.button.delete') }}">
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
                            <a class="page-link" href="{{ $detail_perpus->previousPageUrl() }}">
                                {{ trans('kelolaPerpustakaan.pagination.previous') }}
                            </a>
                        </li>
                        <li class="page-item">
                            {{ $detail_perpus->links('pagination::bootstrap-4') }}
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $detail_perpus->nextPageUrl() }}">
                                {{ trans('kelolaPerpustakaan.pagination.next') }}
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div>
                {{ trans('kelolaPerpustakaan.pagination.show') }}
                {{ $detail_perpus->firstItem() }}
                {{ trans('kelolaPerpustakaan.pagination.to') }}
                {{ $detail_perpus->lastItem() }}
                {{ trans('kelolaPerpustakaan.pagination.of') }}
                {{ $detail_perpus->total() }}
                {{ trans('kelolaPerpustakaan.pagination.data') }}
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_export" role="dialog" tabindex="-1" >
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Pilih data ekspor
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('detail-perpustakaan.export') }}" method="GET">
                        <label for="select_export"><strong>Pilih perpustakaan</strong></label>
                        <div class="input-group mb-4">
                            <select id="select_export" name="filter"
                                data-placeholder="{{ trans('detailPerpustakaan.form-input.placeholder.library') }}"
                                class="form-control">
                            </select>
                        </div>
                        <div class="input_group mb-4">
                            <label for="rentang_tahun"><strong>Rentang waktu</strong></label>
                            <div class="row" id="rentang_tahun">
                                <div class="col">
                                    <input type="text" class="form-control" name="from_year" placeholder="Dari tahun">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="to_year" placeholder="Sampai tahun">
                                </div>
                            </div>
                        </div>
                        <div class="fa-pull-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                {{ trans('kelolaPerpustakaan.button.close') }}
                            </button>
                            <button class="btn btn-primary" type="submit">
                            Ok
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Akhir Content  --}}
@endsection

@include('detailPerpustakaan._info')

@push('css-external')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('javascript-external')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/'.app()->getLocale().'.js') }}"></script>
@endpush

@push('javascript-internal')
    <script>
        $("#DataTable").DataTable({
            "responsive" : true,
            "autoWidth" : true,
            "bLengthChange" :true,
            "bInfo" : false,
            "paging" : false,
            "scrolly" : 400,
            "scrollx" : true,
            "scrollCollapse" : true,
        });

        $('#modal_rekap_bulanan').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget)
            var nmlembaga = button.data('nmlembaga')
            var pengunjung = button.data('pengunjung')
            var member = button.data('member')
            var peminjaman = button.data('peminjaman')
            var judul = button.data('judul')
            var eksemplar = button.data('eksemplar')
            var tahun = button.data('tahun')
            var created_at = button.data('created_at')
            var updated_at = button.data('updated_at')

            var modal = $(this)
            modal.find('.modal-body #perpus').val(nmlembaga)
            modal.find('.modal-body #pengunjung').val(pengunjung)
            modal.find('.modal-body #member').val(member)
            modal.find('.modal-body #peminjaman').val(peminjaman)
            modal.find('.modal-body #judul').val(judul)
            modal.find('.modal-body #eksemplar').val(eksemplar)
            modal.find('.modal-body #tahun').val(tahun)
            modal.find('.modal-body #created_at').val(created_at)
            modal.find('.modal-body #updated_at').val(updated_at)
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

        $(function() {
         //select2 parent_category
            $('#select_perpus').select2({
                theme: 'bootstrap4',
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                url: "{{ route('detail-perpustakaan.select') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                            text: item.nmlembaga,
                            id: item.id
                            }
                        })
                    };
                }
                }
            });
        });

        $(function() {
         //select2 parent_category
            $('#select_export').select2({
                theme: 'bootstrap4',
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                url: "{{ route('detail-perpustakaan.select') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                            text: item.nmlembaga,
                            id: item.id
                            }
                        })
                    };
                }
                }
            });
        });
    </script>
@endpush