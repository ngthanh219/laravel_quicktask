@extends('components/layout')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>{{ trans('image.images') }}</h1>
            <ol class="breadcrumb">
                <li>{{ trans('image.images_manager') }}</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#settings" data-toggle="tab" aria-expanded="true">{{ trans('user.name_form') }}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal" action="{{ route('image.update', $images->id) }}" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ trans('image.name') }}</label>
                                            <select name="user_id" class="form-control">
                                                @foreach ($users as $user)
                                                    @if ($user->images->contains($images))
                                                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                                    @else
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('user_id'))
                                                <div class="error">{{ $errors->first('user_id') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>{{ trans('image.image') }}</label>
                                            <input type="file" name="image" />
                                            <span>
                                                {{ trans('image.image_current') }}: {{ $images->image }}
                                            </span>
                                            @if ($errors->has('image'))
                                                <div class="error">{{ $errors->first('image') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-danger">{{ trans('image.update_submit_button') }}</button>
                                            <a href="{{ route('image.index') }}" class="btn btn-info quaylai">{{ trans('image.return') }}</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
