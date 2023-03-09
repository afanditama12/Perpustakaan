@extends('layouts.dashboard')

@section('title')
    {{ trans('roles.title.index') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('roles') }}
@endsection

@section('content')
<!-- section:content -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('roles.index') }}" method="GET">
                        <div class="input-group">
                            <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" 
                            placeholder="{{ trans('roles.form_control.input.search.placeholder') }}">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    @can('role_create')
                    <a href="{{ route('roles.create') }}" class="btn btn-success float-right" role="button">
                        {{ trans('roles.button.create.value') }}
                        <i class="fas fa-plus-square"></i>
                    </a>
                    @endcan
                </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                <!-- list role -->
                    @forelse ($roles as $role)
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                        <label class="mt-auto mb-auto">
                            {{ $role->name }}  
                        </label>
                        <div>
                            @can('role_detail')
                            <!-- detail -->
                            <a href="{{ route('roles.show', ['role' => $role]) }}" class="btn btn-primary btn-circle"
                            role="button">
                                <i class="fas fa-eye"></i>
                            </a>
                            @endcan
                            @can('role_update')
                            <!-- edit -->
                            <a href="{{ route('roles.edit', ['role' => $role]) }}" class="btn btn-info btn-circle" role="button">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endcan
                            @can('role_delete')
                            <!-- delete -->
                            <form class="d-inline" action="{{ route('roles.destroy', ['role' => $role]) }}" 
                                role="alert" method="POST" alert-title="{{ trans('roles.alert.delete.title') }}"
                                alert-text="{{ trans('roles.alert.delete.message.confirm', ['name' => $role->name]) }}" 
                                alert-btn-cancel="{{ trans('roles.button.cancel.value') }}" 
                                alert-btn-yes="{{ trans('roles.button.delete.value') }}">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </li>
                    @empty
                        <p>
                            <strong>
                                @if (request()->get('keyword'))
                                {{ trans('roles.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                                @else
                                {{ trans('roles.label.no_data.fetch') }} 
                                @endif
                            </strong>
                        </p>
                    @endforelse
                    
                    <!-- list role -->
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('javascript-internal')
    <script>
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
    </script>
@endpush