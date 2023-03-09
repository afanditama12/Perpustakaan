@extends('layouts.dashboard')

@section('title')
    {{ trans('detailPerpustakaan.title.create') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('add_recap') }}
@endsection

@section('content')
<div class="col-md-12 shadow">
	<div class="card-body">
		<form action="{{ route('detail-perpustakaan.store') }}" method="POST">
			@csrf
            <div class="row align-items-center">
                <div class="col-3">
                    {{ trans('detailPerpustakaan.form-input.label.library') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <select id="select_perpus" name="id_perpus"
                        data-placeholder="{{ trans('detailPerpustakaan.form-input.placeholder.library') }}"
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
                    {{ trans('detailPerpustakaan.form-input.label.visitor') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('pengunjung') is-invalid @enderror" id="input_jumlah_pengunjung" name="pengunjung" value="{{ old('pengunjung') }}"
                    placeholder="{{ trans('detailPerpustakaan.form-input.placeholder.visitor') }}">
                    @error('pengunjung')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">
                    {{ trans('detailPerpustakaan.form-input.label.member') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('member') is-invalid @enderror" id="input_jumlah_member" name="member" value="{{ old('member') }}"
                    placeholder="{{ trans('detailPerpustakaan.form-input.placeholder.member') }}">
                    @error('member')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">
                    {{ trans('detailPerpustakaan.form-input.label.borrower') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('peminjam') is-invalid @enderror" id="input_jumlah_peminjam" name="peminjam" value="{{ old('peminjam') }}"
                    placeholder="{{ trans('detailPerpustakaan.form-input.placeholder.borrower') }}">
                    @error('peminjam')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">
                    {{ trans('detailPerpustakaan.form-input.label.title_book') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="input_judul" name="judul" value="{{ old('judul') }}"
                    placeholder="{{ trans('detailPerpustakaan.form-input.placeholder.title_book') }}">
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
                    {{ trans('detailPerpustakaan.form-input.label.exemplar') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('eksemplar') is-invalid @enderror" id="input_eksemplar" name="eksemplar" value="{{ old('eksemplar') }}"
                    placeholder="{{ trans('detailPerpustakaan.form-input.placeholder.exemplar') }}">
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
                    {{ trans('detailPerpustakaan.form-input.label.year') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="number" min="1999" max="2099" step="1" class="form-control @error('tahun') is-invalid @enderror" id="input_tahun" name="tahun" value="{{ old('tahun') }}"
                    placeholder="{{ trans('detailPerpustakaan.form-input.placeholder.year') }}">
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
                    <a href="{{ route('detail-perpustakaan.index') }}" type="button" class="btn btn-secondary">{{ trans('kelolaPerpustakaan.button.back') }}</a>
                    <button type="submit" class="btn btn-primary">{{ trans('detailPerpustakaan.button.add') }}</button>
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