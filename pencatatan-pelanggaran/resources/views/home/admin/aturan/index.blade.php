@extends('layouts.master')
@section('title', 'Kelola Aturan')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Kelola Data Aturan</h4>
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
                    <a href="#" class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalCreate">Tambah Data</a>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Nama Aturan</th>
                                    <th>Poin</th>
                                    <th>Hukuman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aturan as $a)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $a->Jenis->nama_jenis }}</td>
                                    <td>{{ $a->nama_aturan }}</td>
                                    <td>{{ $a->poin }}</td>
                                    <td>{{ $a->Hukuman->hukuman }}</td>
                                    <td>
                                        <a href="{{ route('aturan.edit', $a->id) }}" class="btn btn-link">
                                            <i class="fa fa-edit fa-lg"></i>
                                        </a>
                                        <a class="btn btn-link" onclick="confirmDel('{{ route('aturan.destroy', $a->id) }}')">
                                            <i class="fa fa-trash text-danger fa-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('aturan.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Jenis</label>
                        <select name="id_jenis" class="form-control">
                            @foreach ($jenis as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Aturan</label>
                        <input type="text" name="nama_aturan" class="form-control" placeholder="Masukkan Nama Aturan">
                        @if ($errors->first('nama_aturan'))
                            <p class="text-danger">* {{ $errors->first('nama_aturan') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Poin</label>
                        <input type="text" name="poin" class="form-control" placeholder="Masukkan Poin Aturan">
                        @if ($errors->first('poin'))
                            <p class="text-danger">* {{ $errors->first('poin') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        {{-- TODO: jangan tampilkan id --}}
                        <label>Hukuman</label>
                        <input list="hukuman" name="id_hukuman" class="form-control">
                        <datalist id="hukuman">
                            @foreach ($hukuman as $h)
                                <option value="{{ $h->id }}">{{ $h->hukuman }}</option>
                            @endforeach
                        </datalist>
                        @if ($errors->first('id_hukuman'))
                            <p class="text-danger">* {{ $errors->first('id_hukuman') }}</p>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection