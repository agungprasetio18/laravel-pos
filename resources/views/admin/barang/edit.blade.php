@extends('layouts.app')

@section('title', 'Admin - Edit Barang')

@section('active-admin-barang', 'active')


@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit barang
                        <button class="btn btn-sm btn-primary shadow-sm float-right" onclick="document.location.href='{{route('admin.barang.index')}}'">
                            <i class="fas fa-chevron-left text-white-50"></i> Back
                        </button>
                    </h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.barang.update', $barang->id) }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                            <label for="nama_barang" class="col-md-4 col-form-label text-md-right">Barang</label>
                            <div class="col-md-6">
                                <input id="nama_barang" type="text" class="form-control" name="nama_barang" value="{{$barang->nama_barang}}"required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="merek" class="col-md-4 col-form-label text-md-right">Merek</label>
                            <div class="col-md-6">
                                <select name="id_merek" id="id_merek" class="form-control" required="true">
                                    <option value=""></option>
                                    @foreach($mereks as $merek)
                                    @if($merek->id == $barang->id_merek)
                                    <option value="{{$barang->id_merek}}" selected>{{$barang->merek->nama_merek}}</option>
                                    @else
                                    <option value="{{$merek->id}}">{{$merek->nama_merek}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="distributor" class="col-md-4 col-form-label text-md-right">Distributor</label>
                            <div class="col-md-6">
                                <select name="id_distributor" id="id_distributor" class="form-control" required="true">
                                    <option value=""></option>
                                    @foreach($distributors as $distributor)
                                    @if($distributor->id == $barang->id_distributor)
                                    <option value="{{$barang->id_distributor}}" selected >{{$barang->distributor->nama_distributor}}</option>
                                    @else
                                    <option value="{{$distributor->id}}">{{$distributor->nama_distributor}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_masuk" class="col-md-4 col-form-label text-md-right">Tanggal Masuk</label>
                            <div class="col-md-6">
                                <input id="tanggal_masuk" type="date" class="form-control" name="tanggal_masuk" value="{{$barang->tanggal_masuk}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nip" class="col-md-4 col-form-label text-md-right">Harga Barang</label>
                            <div class="col-md-6">
                                <input id="harga_barang" type="number" class="form-control" name="harga_barang" value="{{$barang->harga_barang}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nip" class="col-md-4 col-form-label text-md-right">Stok barang</label>
                            <div class="col-md-6">
                                <input id="stok_barang" type="text" class="form-control" name="stok_barang" value="{{$barang->stok_barang}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nip" class="col-md-4 col-form-label text-md-right">Keterangan</label>
                            <div class="col-md-6">
                                <textarea id="keterangan"  class="form-control" name="keterangan" rows="6" required autofocus> {{$barang->keterangan}} </textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary shadow">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection