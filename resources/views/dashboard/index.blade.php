@extends('layouts.dashboard')

@section('title')
    {{ trans('dashboard.title.index') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>
                {{ trans('dashboard.greeting.welcome', ['name' => Auth::user()->name]) }}
            </h3>
        </div>
    </div>
    <div class="row">
        <!-- Perpustakaan -->
        <div class="ml-xl-auto col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ trans('dashboard.countable.library') }}    
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $perpustakaan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total rekap bulanan -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                {{ trans('dashboard.countable.total_rbulanan') }}    
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_rekap_bulanan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="mr-xl-auto col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                {{ trans('dashboard.countable.users') }}    
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="card shadow h-100 py-2">
            <div class="row">
                <div class="col pl-4 pt-4 pb-4 pr-5">
                    <form action="{{ route('dashboard.index') }}" method="GET">
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
                <div class="col"></div>
            </div>
            <div class="row- row-cols-xl-1">
                <div class="col" id="chartPengunjung"></div>
            </div>
        </div>
    </div>

<!-- Content Row -->
@endsection

@push('css-external')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('javascript-external')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/'.app()->getLocale().'.js') }}"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>  
    <!-- optional -->  
    <script src="https://code.highcharts.com/modules/offline-exporting.js"></script>  
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
@endpush

@push('javascript-internal')
    <script>
        Highcharts.chart('chartPengunjung', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Data Perpustakaan'
                    },
                    xAxis: {
                        categories: [
                            'Pengunjung',
                            'Anggota',
                            'Peminjam',
                            'judul',
                            'eksemplar'
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Jumlah'
                        }
                    },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'jumlah',
                data: {!!json_encode($jumlah)!!}

            }]
        });

        $(function() {
         //select2 parent_category
            $('#select_perpus').select2({
                theme: 'bootstrap4',
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                url: "{{ route('dashboard.select') }}",
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