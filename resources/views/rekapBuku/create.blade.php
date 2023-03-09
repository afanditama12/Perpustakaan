@extends('layouts.dashboard')

@section('title')
    {{ trans('rekapBuku.title.create') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('add_book') }}
@endsection

@section('content')
<div class="col-md-12 shadow">
	<div class="card-body">
		<form action="{{ route('rekap-buku.store') }}" method="POST">
			@csrf
            <div class="row align-items-center">
                <div class="col-3">
                    {{ trans('rekapBuku.form-input.label.library') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <select id="select_perpus" name="id_perpus"
                        data-placeholder="{{ trans('rekapbulanan.form-input.placeholder.library') }}"
                        class="form-control  @error('id_perpus') is-invalid @enderror">
                        @if (old('id_perpus'))
                            <option value="{{ old('id_perpus')->id }}" selected>
                                {{ old('id_perpus')->nmlembaga }}
                            </option>
                        @endif
                    </select>
                    @error('id_perpus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
			<div class="row align-items-center">
                <div class="col-3">
                    {{ trans('rekapBuku.form-input.label.title') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="input_jumlah_judul" 
                    name="judul" value="{{ old('judul') }}"
                    placeholder="{{ trans('rekapBuku.form-input.placeholder.title') }}">
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">
                    {{ trans('rekapBuku.form-input.label.exemplar') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('eksemplar') is-invalid @enderror" id="input_jumlah_eksemplar" 
                    name="eksemplar" value="{{ old('eksemplar') }}"
                    placeholder="{{ trans('rekapBuku.form-input.placeholder.exemplar') }}">
                    @error('eksemplar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">
                    {{ trans('rekapBuku.form-input.label.year') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="input_tahun" 
                    name="tahun" value="{{ old('tahun') }}"
                    placeholder="{{ trans('rekapBuku.form-input.placeholder.year') }}">
                    @error('tahun')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <table style="width: 100%;">
                <td style="text-align: right;">
                    <a href="{{ route('rekap-buku.index') }}" type="button" class="btn btn-secondary">{{ trans('rekapBuku.button.back') }}</a>
                    <button type="submit" class="btn btn-primary">{{ trans('rekapBuku.button.add') }}</button>
                </td>
            </table>
        </form>
    </div>
</div>
@endsection

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