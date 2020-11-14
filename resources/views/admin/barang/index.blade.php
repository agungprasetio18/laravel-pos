@extends('layouts.app')

@section('title', 'Admin - Barang')
@section('active-admin-barang', 'active')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 text-gray-800">Barang</h1>
    <a href="{{route('admin.barang.create')}}"class="btn btn-sm btn-primary shadow" >
        <i class="fas fa-upload fa-sm text-white-50"></i> Tambah Barang
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
                <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Merek</th>
                                <th>Distributor</th>
                                <th>Tanggal Masuk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->nama_barang}}</td>
                                <td>{{ $barang->merek->nama_merek}}</td>
                                <td>{{ $barang->distributor->nama_distributor}}</td>
                                <td>{{ $barang->tanggal_masuk}}</td>
                                <td>{{ $barang->harga_barang }}</td>
                                <td>{{ $barang->stok_barang }}</td>
                                <td>{{$barang->keterangan}}</td>
                                <td align="center">
                                <a href="{{route('admin.barang.edit', $barang->id)}}" class="btn btn-info btn-sm btn-circle"> <i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm btn-circle" data-toggle="modal"
                                        data-target="#modalDelete" data-id="{{$barang->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
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

<!-- modal delete -->
<div class="modal fade" id="modalDelete" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">Delete Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin untuk menghapus file ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="delete">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal delete -->
@endsection

@section('js')
<script>

    $(document).ready(function () {
        $('#modalDelete').on('show.bs.modal', function (e) {
            let id = $(e.relatedTarget).data('id');
            let url = "{{ route('admin.barang.destroy', ':id') }}";
            url = url.replace(':id', id);

            $('#delete').on('click', function () {
                $('#modalDelete').modal('hide');
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {
                        '_token': $('input[name="_token"').val(),
                        'id': id,
                    },
                    success: function (data) {
                        location.reload(true);
                        alert('Data Berhasil di Hapus');
                    },
                });
            });

        });

    });

</script>
@endsection
