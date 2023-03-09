@extends('layouts.dashboard')

@section('title')
    {{ trans('rekapBuku.title.index') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('book_list') }}
@endsection

@section('content')
    {{-- Awal Content --}}
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ trans('rekapBuku.table.tableName') }}
                        </h6>
                    </div>
                    <div class="col-5 mt-3">
                        <form action="{{ route('rekap-buku.index') }}" method="GET">
                            <div class="input-group">
                                <select id="select_perpus" name="filter"
                                    data-placeholder="{{ trans('rekapbulanan.form-input.placeholder.library') }}"
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
                    <div class="col-2">
                        <div class="fa-pull-right">
                            @can('book_create')
                            <a href="{{ route('rekap-buku.create') }}" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">
                                    {{ trans('rekapBuku.button.add') }}
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
                                {{ trans('rekapBuku.table.library') }}
                            </th>
                            <th scope="col">
                                {{ trans('rekapBuku.table.judul') }}
                            </th>
                            <th scope="col">
                                {{ trans('rekapBuku.table.eksemplar') }}
                            </th>
                            <th scope="col">
                                {{ trans('rekapBuku.table.year') }}
                            </th>
                            <th scope="col">
                                {{ trans('rekapBuku.table.action') }}
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekapBuku as $rb)
                            <tr>
                                <td scope="row">{{$loop->iteration + $rekapBuku->firstItem()-1}}</td>
                                <td>{{ $rb->profil->nmlembaga }}</td>
                                <td>{{ $rb->judul }}</td>
                                <td>{{ $rb->eksemplar }}</td>
                                <td>{{ $rb->tahun }}</td>
                                <td style="width: 154px">
                                    @can('book_detail')
                                    <a href="" class="btn btn-primary" data-target="#modal_rekap_buku"
                                    data-toggle="modal" data-perpus="{{ $rb->profil->nmlembaga }}" data-title="{{ $rb->judul }}" 
                                    data-exemplar="{{ $rb->eksemplar }}" data-tahun="{{ $rb->tahun }}" data-created_at="{{ $rb->created_at }}"
                                    data-updated_at="{{ $rb->updated_at }}">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    @endcan
                                    @can('book_update')
                                    <a href="{{ route('rekap-buku.edit', ['rekap_buku' => $rb]) }}" 
                                        class="btn btn-info" role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('book_delete')
                                    <form class="d-inline" action="{{ route('rekap-buku.destroy', ['rekap_buku' => $rb]) }}" 
                                        role="alert" method="POST" alert-title="{{ trans('rekapBuku.alert.delete.title') }}"
                                        alert-text="{{ trans('rekapBuku.alert.delete.message.confirm', ['title' => $rb->tahun, 'time' => $rb->created_at]) }}" 
                                        alert-btn-cancel="{{ trans('rekapBuku.button.cancel') }}" 
                                        alert-btn-yes="{{ trans('rekapBuku.button.delete') }}">
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
                            <a class="page-link" href="{{ $rekapBuku->previousPageUrl() }}">
                                {{ trans('kelolaPerpustakaan.pagination.previous') }}
                            </a>
                        </li>
                        <li class="page-item">
                            {{ $rekapBuku->links('pagination::bootstrap-4') }}
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $rekapBuku->nextPageUrl() }}">
                                {{ trans('kelolaPerpustakaan.pagination.next') }}
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div>
                {{ trans('kelolaPerpustakaan.pagination.show') }}
                {{ $rekapBuku->firstItem() }}
                {{ trans('kelolaPerpustakaan.pagination.to') }}
                {{ $rekapBuku->lastItem() }}
                {{ trans('kelolaPerpustakaan.pagination.of') }}
                {{ $rekapBuku->total() }}
                {{ trans('kelolaPerpustakaan.pagination.data') }}
            </div>
            </div>
            </div>
    {{-- Akhir Content  --}}
@endsection

@include('rekapBuku._info')

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

        $('#modal_rekap_buku').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget)
            var nmlembaga = button.data('perpus')
            var title = button.data('title')
            var exemplar = button.data('exemplar')
            var tahun = button.data('tahun')
            var created_at = button.data('created_at')
            var updated_at = button.data('updated_at')

            var modal = $(this)
            modal.find('.modal-body #perpus').val(nmlembaga)
            modal.find('.modal-body #judul').val(title)
            modal.find('.modal-body #eksemplar').val(exemplar)
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
                url: "{{ route('rekap-buku.select') }}",
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