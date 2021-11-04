@extends('layouts.AdminLTE.index')

@section('icon_page', 'gear')

@section('title', 'Application Settings')

@section('content')

<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('website.update',$website->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4><b><i class="fa fa-fw fa-arrow-right"></i>Informasi Website</b></h4>
                            <hr />
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group {{ $errors->has('app_name') ? 'has-error' : '' }}">
                                <label for="nome">Nama Website</label>
                                <input type="text" name="app_name" class="form-control" maxlength="50"
                                    placeholder="Application Name" value="{{$website->app_name}}">
                                @if($errors->has('app_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('app_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group {{ $errors->has('puskesmas_name') ? 'has-error' : '' }}">
                                <label for="nome">Nama Puskesmas</label>
                                <input type="text" name="puskesmas_name" class="form-control" maxlength="50"
                                    value="{{$website->puskesmas_name}}">
                                @if($errors->has('puskesmas_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('puskesmas_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group {{ $errors->has('puskesmas_alamat') ? 'has-error' : '' }}">
                                <label for="nome">Alamat</label>
                                <input type="text" name="puskesmas_alamat" class="form-control" maxlength="70"
                                    placeholder="Alamat" value="{{$website->puskesmas_alamat}}">
                                @if($errors->has('puskesmas_alamat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('puskesmas_alamat') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group {{ $errors->has('puskesmas_nohp') ? 'has-error' : '' }}">
                                <label for="nome">No Telepon</label>
                                <input type="text" name="puskesmas_nohp" class="form-control" maxlength="50"
                                    value="{{$website->puskesmas_nohp}}">
                                @if($errors->has('puskesmas_nohp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('puskesmas_nohp') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group {{ $errors->has('puskesmas_email') ? 'has-error' : '' }}">
                                <label for="nome">Email</label>
                                <input type="email" name="puskesmas_email" class="form-control" maxlength="50"
                                    value="{{$website->puskesmas_email}}">
                                @if($errors->has('puskesmas_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('puskesmas_email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group {{ $errors->has('puskesmas_image_size') ? 'has-error' : '' }}">
                                <label for="nome">Image Size</label>
                                <input type="number" name="puskesmas_image_size" class="form-control"
                                    value="{{$website->puskesmas_image_size}}">
                                @if($errors->has('puskesmas_image_size'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('puskesmas_image_size') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <label>Current Image</label>
                            <br>
                            <img src="{{ asset($website->puskesmas_image) }}" width="30px" class="img-thumbnail">
                            <br><br>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group {{ $errors->has('puskesmas_image') ? 'has-error' : '' }}">
                                <label>Image Logo</label>
                                <input type="file" class="form-control-file" name="puskesmas_image">
                                @if($errors->has('puskesmas_image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('puskesmas_image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <label>Current Favicon</label>
                            <br>
                            <img src="{{ asset($website->favicon) }}" width="30px" class="img-thumbnail">
                            <br><br>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group {{ $errors->has('favicon') ? 'has-error' : '' }}">
                                <label>Favicon</label>
                                <input type="file" class="form-control-file" name="favicon">
                                @if($errors->has('favicon'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('favicon') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr />
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-save"></i>
                                Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection