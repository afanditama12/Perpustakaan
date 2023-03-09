@extends('layouts.perpus')

@section('title')
    {{ request()->get('keyword') }}
@endsection

@section('content')
    <!-- page title -->
    <h2 class="my-3">
        {{ trans('perpus.title.search', ['keyword' => request()->get('keyword')]) }}
    </h2>
    <!-- Breadcrumbs:start -->
    {{ Breadcrumbs::render('perpus_search', request()->get('keyword')) }}
    <!-- Breadcrumbs:end -->

    <div class="row">
        <!-- perpus list:start -->
        @forelse ($perpus as $pp)
            <div class="col-md-4">
                <div class="card mb-3">
                    @if (empty($pp->logo))
                    <img src="{{ asset('vendor/img/perpus.png') }}" 
                    alt="" class="card-img-top">
                    @else
                    <img src="{{ asset( $pp->logo ) }}" 
                    alt="" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $pp->nmlembaga }}</h5>
                        <a href="{{ route('perpus.profil', ['profil_perpustakaan' => $pp]) }}" class="btn btn-primary">
                            {{ trans('perpus.button.show_more.value') }}
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <!-- empty -->
            <h3 class="text-center">
                {{ trans('perpus.no_data.search_posts') }}
            </h3>
        @endforelse
        <!-- Post list:end -->
    </div>
        
        <!-- pagination:start -->
        @if ($perpus->hasPages())   
        <div class="row fa-pull-right">
            <div class="col">
                {{ $perpus->links('pagination::bootstrap-4') }}
            </div>
        </div>
        @endif
<!-- pagination:end -->
@endsection