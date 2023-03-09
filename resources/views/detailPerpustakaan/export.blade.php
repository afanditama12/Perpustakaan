@extends('layouts.dashboard')

@section('title')
    {{ trans('detailPerpustakaan.title.export') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('export') }}
@endsection

@section('content')
    {{-- Awal Content --}}
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row align-items-center input-yearrange">
                    <div class="col-4">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ trans('detailPerpustakaan.table.tableName') }}
                        </h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="exporttabel" style="width: 100%" cellspacing="0">
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
    {{-- Akhir Content  --}}
@endsection

@include('detailPerpustakaan._info')

@push('css-external')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endpush

@push('javascript-external')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/'.app()->getLocale().'.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
@endpush

@push('javascript-internal')
    <script>
        $(document).ready(function() {
            $("#exporttabel").DataTable({
            "responsive" : true,
            "autoWidth" : true,
            "bLengthChange" :true,
            "bInfo" : false,
            "paging" : false,
            "scrolly" : 400,
            "scrollx" : true,
            "scrollCollapse" : true,
            dom : 'Bfrtip',
            buttons: ['copy','csv','excel','pdf','print']
            });
        });
    </script>
@endpush