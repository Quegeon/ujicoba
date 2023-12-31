@extends('layouts.master')
@section('title', 'Bk')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Bk</h4>
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
                    <a href="/admin/bk/create" class="btn btn-primary mb-2 ml-3" data-toggle="modal" data-target="#modalCreate">Tambah Data</a>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bk as $u)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <img src="{{asset('fotobk/'.$u->foto)}}" alt="" style="width:60px; height:80px;">
                                    </td>
                                    <td>{{$u->nama}}</td>
                                    <td>{{$u->username}}</td>
                                    <td>{{$u->created_at}}</td>
                                    <td>
                                        <a href="{{ route('bk.edit', $u->id) }}" class="btn btn-link"><i class="fa fa-edit" style="font-size: 25px"></i> </a>
                                        <a href="/bk/{{$u->id}}/destroy" class="btn btn-link"><i class="fa fa-trash text-danger" style="font-size: 25px"></i> </a>
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
                <form action="/bk/store" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Isi Nama">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input class="form-control" type="password" name="password" id="username" placeholder="Password">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Masukan foto</label>
                        <input type="file" id="image" class="form-control" name="foto" onchange="imagePreview()">
                    </div>
                    <center>
                        <img class="img-preview img-fluid " style="display: none; justify:center" height="200" width="200px">
                    </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection