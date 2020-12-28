@extends('components/layout')

@section('content')
    <div class="content-wrapper" id="formContent">
        <section class="content-header">
            <h1>{{ trans('image.images') }}</h1>
            <div class="timeline-footer mystyle">
                <a href="{{ route('image.create') }}" class="btn btn-primary btn mystyle">
                    <i class="fa fa-plus-square"></i> {{ trans('image.add_button') }}
                </a>
            </div>
            <ol class="breadcrumb">
                <li>{{ trans('image.images_manager') }}</li>
            </ol>
            @if (session()->has('infoMessage'))
                <div class="col-md-3 infoMessage mystyle">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <i class="fa fa-bell-o"></i> {{ trans('image.notifi') }}
                            </h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            {{ session()->get('infoMessage') }}
                        </div>
                    </div>
                </div>
            @endif
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ trans('image.list') }}</h3>
                            <div class="box-tools">
                                <div class="input-group input-group-sm hidden-xs mystyle">
                                    <input type="text" name="search" class="form-control pull-right" placeholder="{{ trans('user.filter') }}" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div id="livesearch"></div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover text-center">
                                <tbody>
                                    <tr>
                                        <th>{{ trans('image.name') }}</th>
                                        <th>{{ trans('image.image') }}</th>
                                        <th>{{ trans('image.actions') }}</th>
                                    </tr>
                                    @foreach ($images as $img)
                                        <tr>
                                            <td>{{ $img->user->name }}</td>
                                            <td class="my-img">
                                                <img src="{{ asset('images/'. $img->image) }}" />
                                            </td>
                                            <td class="td mystyle">
                                                <a href="{{ route('image.edit', $img->id) }}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('image.destroy', $img->id) }}" method="POST" class="delete-form mystyle">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col-sm-12 text-right">
                                <div class="dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="{{ asset('assets/dist/js/general/style-one.js') }}" defer></script>
@endsection
