@extends('layouts.master')
@section('title', 'Edit Jenis')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Halaman Edit Jenis</h4>
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
                        <form action="{{ route('jenis.update', $jenis->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Nama Jenis</label>
                                <input class="form-control" type="text" name="nama_jenis" value="{{ $jenis->nama_jenis }}" placeholder="{{ $jenis->nama_jenis }}">
                                @if($errors->first('nama_jenis'))
                                    <p class="text-danger">* {{ $errors->first('nama_jenis') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input class="form-control" type="text" name="keterangan" value="{{ $jenis->keterangan }}" placeholder="{{ $jenis->keterangan }}">
                                @if($errors->first('keterangan'))
                                    <p class="text-danger">* {{ $errors->first('keterangan') }}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection