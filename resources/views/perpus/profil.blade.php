@extends('layouts.perpus')

@section('title')
    Profil
@endsection

@section('content')
    <!-- page title -->
    <h2 class="my-3">
        {{ trans('perpus.title.profil', ['title' => $profil_perpustakaan->nmlembaga]) }}
    </h2>
    <!-- Breadcrumbs:start -->
    {{ Breadcrumbs::render('profil_perpus', $profil_perpustakaan) }}
    <!-- Breadcrumbs:end -->

    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            {{-- <h1 class="text-uppercase">{{ $profil_perpustakaan->nmlembaga }}</h1> --}}
            @if (empty($profil_perpustakaan->logo))
            <div style="text-align: center;">
                <img style="width: 300px; height: 300px;" src="{{ asset('vendor/img/perpus.png') }}" alt="">
            </div>
            @else
            <div style="text-align: center;">
                <img style="width: 300px; height: 300px;" src="{{ asset($profil_perpustakaan->logo) }}" alt="">
            </div>
            @endif
            <br>
            <p>{{ $profil_perpustakaan->deskripsi }}</p>
            <table>
                <tbody>
                    <tr style="height: 5px">
                        <td style="height: 46px; width: 184.65px;">
                            <p>Instansi</p>
                        </td>
                        <td style="height: 46px; width: 9.58333px;">
                            <p>:</p>
                        </td>
                        <td style="height: 46px; width: 363.767px;">
                            <p>{{ $profil_perpustakaan->nmlembaga }}</p>
                        </td>
                    </tr>
                    <tr style="height: 5px">
                        <td style="height: 46px; width: 184.65px;">
                            <p>Penanggung Jawab</p>
                        </td>
                        <td style="height: 46px; width: 9.58333px;">
                            <p>:</p>
                        </td>
                        <td style="height: 46px; width: 363.767px;">
                            <p>{{ $profil_perpustakaan->nmpenanggungJawab }}</p>
                        </td>
                    </tr>
                    <tr style="height: 5px">
                        <td style="height: 46px; width: 184.65px;">
                            <p>Pengelola</p>
                        </td>
                        <td style="height: 46px; width: 9.58333px;">
                            <p>:</p>
                        </td>
                        <td style="height: 46px; width: 363.767px;">
                            <p>{{ $profil_perpustakaan->nmpengelola }}</p>
                        </td>
                    </tr>
                    <tr style="height: 5px">
                        <td style="height: 46px; width: 184.65px;">
                            <p>SK Pendirian</p>
                        </td>
                        <td style="height: 46px; width: 9.58333px;">
                            <p>:</p>
                        </td>
                        <td style="height: 46px; width: 363.767px;">
                            <p>{{ $profil_perpustakaan->skpendirian }}</p>
                        </td>
                    </tr>
                    <tr style="height: 5px">
                        <td style="height: 46px; width: 184.65px;">
                            <p>Telepon</p>
                        </td>
                        <td style="height: 46px; width: 9.58333px;">
                            <p>:</p>
                        </td>
                        <td style="height: 46px; width: 363.767px;">
                            <p>{{ $profil_perpustakaan->telepon }}</p>
                        </td>
                    </tr>
                    <tr style="height: 5px">
                        <td style="height: 46px; width: 184.65px;">
                            <p>Jam Buka</p>
                        </td>
                        <td style="height: 46px; width: 9.58333px;">
                            <p>:</p>
                        </td>
                        <td style="height: 46px; width: 363.767px;">
                            <p>{{ $profil_perpustakaan->jambuka }}</p>
                        </td>
                    </tr>
                    <tr style="height: 5px">
                        <td style="height: 46px; width: 184.65px;">
                            <p>Alamat</p>
                        </td>
                        <td style="height: 46px; width: 9.58333px;">
                            <p>:</p>
                        </td>
                        <td style="height: 46px; width: 363.767px;">
                            <p>{{ $profil_perpustakaan->alamat }}</p>
                        </td>
                    </tr>
                    <tr style="height: 5px">
                        <td style="height: 46px; width: 184.65px;">
                            <p>Sosial Media</p>
                        </td>
                        <td style="height: 46px; width: 9.58333px;">
                            <p>:</p>
                        </td>
                        <td style="height: 46px; width: 363.767px;">
                            @if (empty($profil_perpustakaan->facebook))
                            @else
                            <a href="https://www.facebook.com/{{$profil_perpustakaan->facebook}}" class="btn btn-primary btn-icon-split mb-1">
                                <span class="icon text-white-50">
                                    <i class="fab fa-facebook"></i>
                                </span>
                                <span class="text" style="color: white">Instagram</span>
                            </a>
                            @endif
                            <br>
                            @if (empty($profil_perpustakaan->instagram))
                            @else
                            <a href="https://www.instagram.com/{{$profil_perpustakaan->instagram}}/" class="btn btn-instagram btn-icon-split mb-1" >
                                <span class="icon text-white-50">
                                    <i class="fab fa-instagram"></i>
                                </span>
                                <span class="text" style="color: white">Instagram</span>
                            </a>
                            @endif
                            <br>
                            @if (empty($profil_perpustakaan->twitter))
                            @else 
                            <a href="https://twitter.com/{{$profil_perpustakaan->twitter}}" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fab fa-twitter"></i>
                                </span>
                                <span class="text" style="color: white">Twitter</span>
                            </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="divider"></div>
@endsection