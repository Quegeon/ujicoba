@extends('layouts.master')
@section('title', 'Edit Hukuman')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Halaman Edit Hukuman</h4>
        <div class="btn-group btn-group-page-header ml-auto">
            <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h"></i>
            </button>
            <div class="dropdown-menu">
                <div class="arrow"></div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('hukuman.update', $hukuman->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Hukuman</label>
                                <input class="form-control" type="text" name="hukuman" value="{{ $hukuman->hukuman }}" placeholder="{{ $hukuman->hukuman }}">
                                @if ($errors->first('hukuman'))
                                    <p class="text-danger">* {{ $errors->first('hukuman') }}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a href="{{ route('hukuman.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection