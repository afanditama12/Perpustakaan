@extends('layouts.dashboard')

@section('title')
    {{ trans('kelolaPerpustakaan.title.create') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('Add_library') }}
@endsection

@section('content')
<div class="col-md-12 shadow">
	<div class="card-body">
		<form action="{{ route('listperpustakaan.store') }}" method="POST">
			@csrf
			<div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.nmlembaga.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('nmlembaga') is-invalid @enderror" id="input_perpus_lembaga" name="nmlembaga" value="{{ old('nmlembaga') }}"
                    placeholder="{{ trans('kelolaPerpustakaan.form_control.input.nmlembaga.placeholder') }}">
                    @error('nmlembaga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.pj.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('pj') is-invalid @enderror" id="input_perpus_pj" name="pj" value="{{ old('pj') }}"
                    placeholder="{{ trans('kelolaPerpustakaan.form_control.input.pj.placeholder') }}">
                    @error('pj')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.pengelola.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('nmpengelola') is-invalid @enderror" id="input_perpus_pengelola" name="nmpengelola" value="{{ old('nmpengelola') }}"
                    placeholder="{{ trans('kelolaPerpustakaan.form_control.input.pengelola.placeholder') }}">
                    @error('nmpengelola')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">
                    {{ trans('kelolaPerpustakaan.form_control.input.telepon.label') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="input_telepon" name="telepon" value="{{ old('telepon') }}"
                    placeholder="{{ trans('kelolaPerpustakaan.form_control.input.telepon.placeholder') }}">
                    @error('telepon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">
                    {{ trans('kelolaPerpustakaan.form_control.input.skp.label') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('skp') is-invalid @enderror" id="input_telepon" name="skp" value="{{ old('skp') }}"
                    placeholder="{{ trans('kelolaPerpustakaan.form_control.input.skp.placeholder') }}">
                    @error('skp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            {{-- <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.skp.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <div class="input-group">
                        <span class="input-group-append">
                            <a id="lfm" data-input="input_perpus_skp" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i>
                                {{ trans('kelolaPerpustakaan.form_control.input.skp.button') }}
                            </a>
                        </span>
                        <input id="input_perpus_skp" class="form-control @error('skp') is-invalid @enderror" readonly type="text" name="skp" placeholder="{{ trans('kelolaPerpustakaan.form_control.input.skp.placeholder') }}"
                        id="input_perpus_skp" name="skp" value="{{ old('skp') }}">
                        @error('skp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br> --}}
                    {{-- preview:foto --}}
                    {{-- <div id="holder"></div>
                </div>
            </div>
            <br> --}}
            <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.jambuka.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <input type="text" class="form-control @error('jambuka') is-invalid @enderror" id="input_perpus_jambuka" name="jambuka" value="{{ old('jambuka') }}"
                    placeholder="{{ trans('kelolaPerpustakaan.form_control.input.jambuka.placeholder') }}">
                    @error('jambuka')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">{{ trans('kelolaPerpustakaan.form_control.input.alamat.label') }}</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="input_perpus_alamat" name="alamat"
                    placeholder="{{ trans('kelolaPerpustakaan.form_control.input.alamat.placeholder') }}">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">
                    {{ trans('kelolaPerpustakaan.form_control.input.media.label') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fab fa-facebook"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Facebook" 
                        aria-label="Facebook" aria-describedby="basic-addon1" value="{{ old('facebook') }}"
                        name="facebook">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fab fa-instagram"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Instagram" 
                        aria-label="Instagram" aria-describedby="basic-addon1" value="{{ old('instagram') }}"
                        name="instagram">
                    </div>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">
                    {{ trans('kelolaPerpustakaan.form_control.input.logo.label') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <div class="input-group">
                        <span class="input-group-append">
                            <a id="logo" data-input="input_logo" data-preview="holderlogo" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> 
                                {{ trans('kelolaPerpustakaan.form_control.input.logo.button') }}
                            </a>
                        </span>
                        <input id="input_logo" class="form-control" readonly type="text" name="logoinstansi" 
                        placeholder=" {{ trans('kelolaPerpustakaan.form_control.input.logo.placeholder') }}"
                        id="poto_logo" value="{{ old('logoinstansi') }}">
                    </div>
                    <br>
                    {{-- preview:foto --}}
                    <div id="holderlogo"></div>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">
                    {{ trans('kelolaPerpustakaan.form_control.input.deskripsi.label') }}
                </div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="input_deskripsi" name="deskripsi"
                    placeholder="{{ trans('kelolaPerpustakaan.form_control.input.deskripsi.placeholder') }}">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            @foreach ($data as $item)
                <input type="text" name="id_perpus" value="P{{ $item->id+1 }}" hidden>
            @endforeach
            <table style="width: 100%;">
                <td style="text-align: right;">
                    <a href="{{ route('listperpustakaan.index') }}" type="button" class="btn btn-secondary">{{ trans('kelolaPerpustakaan.button.back') }}</a>
                    <button type="submit" class="btn btn-primary">{{ trans('kelolaPerpustakaan.button.create') }}</button>
                </td>
            </table>
        </form>
    </div>
</div>
@endsection

@push('javascript-internal')
    <script>
        //event:sk pendirian
        $('#lfm').filemanager('image');
        //logo
        $('#logo').filemanager('image');
    </script>
@endpush

@push('javascript-external')
    {{-- file manager --}}
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endpush