@extends('layouts.app')

@section('title', 'Kasir - Transaksi')
@section('active-kasir-transaksi', 'active')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 text-gray-800">Transaksi</h1>
    <a href="{{route('kasir.transaksi.create')}}"class="btn btn-sm btn-primary shadow" >
        <i class="fas fa-upload fa-sm text-white-50"></i> Tambah Transaksi
    </a>
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
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>Tanggal Beli</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $transaksi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaksi->id_transaksi}}</td>
                                <td>{{ $transaksi->tanggal_beli }}</td>
                                <td align="center" style="width: 10px">
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h fa-sm fa-fw text-blue-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right mr-4 shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Action:</div>
                                            <div class="dropdown-divider"></div>
                                            <a href="{{route('kasir.transaksi.detail', $transaksi->id_transaksi )}}" type="button" class="dropdown-item">
                                                Detail
                                            </a>
                                            <a href="{{route('kasir.transaksi.add', $transaksi->id_transaksi )}}" type="button" class="dropdown-item">
                                                Add
                                            </a>
                                            
                                        </div>
                                    </div>
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

@endsection

@section('js')
<script>


</script>
@endsection
