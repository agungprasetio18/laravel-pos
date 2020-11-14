@extends('layouts.app')

@section('title', 'Kasir - Detail Transaksi')
@section('active-kasir-transaksi', 'active')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 text-gray-800">Detail Transaksi</h1>
    <button class="btn btn-sm btn-primary shadow-sm float-right" onclick="document.location.href='{{route('kasir.transaksi.index')}}'">
        <i class="fas fa-chevron-left text-white-50"></i> Back
    </button>
</div>

<div class="row">
    <div class="col-lg-12">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show wow slideInDown shadow" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
            {{ section('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card mb-4 shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Detail Transaksi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>User</th>
                                <th>Barang</th>
                                <th>Jumlah Beli</th>
                                <th>Total Harga</th>
                                <th>Tanggal Beli</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $transaksi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaksi->id_transaksi}}</td>
                                <td>{{ $transaksi->user->name}}</td>
                                <td>{{ $transaksi->barang->nama_barang}}</td>
                                <td>{{ $transaksi->jumlah_beli}}
                                <td>{{ $transaksi->total_harga}}</td>
                                <td>{{ $transaksi->tanggal_beli }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
