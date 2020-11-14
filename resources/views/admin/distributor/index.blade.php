@extends('layouts.app')

@section('title', 'Admin - Distributor')
@section('active-admin-distributor', 'active')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 text-gray-800">Distributor</h1>
    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#modalTambah">
        <i class="fas fa-upload fa-sm text-white-50"></i> Tambah Distributor
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
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card mb-4 shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Distributor</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Distributor</th>
                                <th>Alamat</th>
                                <th>Nomor Telpon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($distributors as $distributor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $distributor->nama_distributor}}</td>
                                <td>{{ $distributor->alamat}}</td>
                                <td>{{ $distributor->no_tlp}}</td>
                                <td align="center">
                                <button type="button" class="btn btn-info btn-sm btn-circle" data-toggle="modal"
                                    data-target="#modalEdit" data-id="{{$distributor->id}}" data-nama="{{$distributor->nama_distributor}}"
                                    data-alamat="{{$distributor->alamat}}" data-no="{{$distributor->no_tlp}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                    <button type="button" class="btn btn-danger btn-sm btn-circle" data-toggle="modal"
                                        data-target="#modalDelete" data-id="{{$distributor->id}}">
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

<!-- modal tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambah"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambah">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" class="form-data" id="form-data" action="{{route('admin.distributor.store')}}">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Distributor</label>
                                <input type="text" name="nama_distributor" id="nama_distributor" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea rows="6" name="alamat" id="alamat" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telephone</label>
                                <input type="text" name="no_tlp" id="no_tlp" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="modalEdit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.distributor.update') }}" method="POST">
                @method('patch')
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="distributor" class="col-md-3 col-form-label">Distributor</label>
                            <div class="col-md-9">
                                <input id="nama_distributor" type="text" class="form-control"
                                    name="nama_distributor" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-3 col-form-label">Alamat</label>
                            <div class="col-md-9">
                                <textarea id="alamat" rows="6" class="form-control"
                                    name="alamat" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="distributor" class="col-md-3 col-form-label">Nomor Telephone</label>
                            <div class="col-md-9">
                                <input id="no_tlp" type="text" class="form-control"
                                    name="no_tlp" required>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal delete -->
<div class="modal fade" id="modalDelete" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">Delete Distributor</h5>
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
        $('#modalEdit').on('show.bs.modal', function(e){
            const button = $(e.relatedTarget);
            let id = button.data('id');
            let nama = button.data('nama');
            let alamat = button.data('alamat');
            let no = button.data('no');
            const modal = $(this);
            
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #nama_distributor').val(nama);
            modal.find('.modal-body #alamat').val(alamat);
            modal.find('.modal-body #no_tlp').val(no);
        })






        //delete
        $('#modalDelete').on('show.bs.modal', function (e) {
            let id = $(e.relatedTarget).data('id');
            let url = "{{ route('admin.distributor.destroy', ':id') }}";
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
