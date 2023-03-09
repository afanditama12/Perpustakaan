@extends('layouts.dashboard')

@section('title')
    {{ trans('user.title.index') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('users') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                    <form action="{{ route('users.index') }}" method="GET">
                        <div class="input-group">
                            <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" 
                            placeholder="{{ trans('user.form_control.input.search.placeholder') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-6">
                        @can('user_create')
                        <a href="{{ route('users.create') }}" class="btn btn-primary float-right" role="button">
                            {{ trans('user.button.create.value') }}
                            <i class="fas fa-plus-square"></i>
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- list users:start -->
                    @forelse ($users as $user)
                        <div class="col-md-6">
                            <div class="card my-1">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <i class="fas fa-id-badge fa-5x"></i>
                                        </div>
                                        <div class="col-md-10">
                                            <table>
                                            <tr>
                                                <th>
                                                    {{ trans('user.label.name') }}
                                                </th>
                                                <td>:</td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    {{ trans('user.label.email') }}
                                                </th>
                                                <td>:</td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    {{ trans('user.label.role') }}
                                                </th>
                                                <td>:</td>
                                                <td>
                                                    {{ $user->roles->first()->name }}
                                                </td>
                                            </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        @can('user_update')
                                        <!-- edit -->
                                        <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-sm btn-info" role="button">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan
                                        @can('user_delete')
                                        <!-- delete -->
                                        <form class="d-inline" action="{{ route('users.destroy', ['user' => $user]) }}" 
                                            role="alert" method="POST" alert-title="{{ trans('user.alert.delete.title') }}"
                                            alert-text="{{ trans('user.alert.delete.message.confirm', ['name' => $user->name]) }}" 
                                            alert-btn-cancel="{{ trans('user.button.cancel.value') }}" 
                                            alert-btn-yes="{{ trans('user.button.delete.value') }}">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>
                            <strong>
                                @if (request()->get('keyword'))
                                {{ trans('user.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                                @else
                                {{ trans('user.label.no_data.fetch') }}  
                                @endif
                            </strong>
                        </p>
                    @endforelse
                    <!-- list users:end -->
                </div>
            </div>
            <div class="card-footer">
                <!-- Todo:paginate -->
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