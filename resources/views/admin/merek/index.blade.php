@extends('layouts.app')

@section('title', 'Admin - Merek')
@section('active-admin-merek', 'active')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 text-gray-800">Merek</h1>
    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#modalTambah">
        <i class="fas fa-upload fa-sm text-white-50"></i> Tambah Merek
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
                <h6 class="m-0 font-weight-bold text-primary">Data Merek</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Merek</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mereks as $merek)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $merek->nama_merek}}</td>
                                <td align="center">
                                    <button type="button" class="btn btn-info btn-sm btn-circle" data-toggle="modal"
                                        data-target="#modalEdit" data-id="{{$merek->id}}" data-nama="{{$merek->nama_merek}}"
                                        >
                                    <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm btn-circle" data-toggle="modal"
                                        data-target="#modalDelete" data-id="{{$merek->id}}">
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
            <form method="post" class="form-data" id="form-data" action="{{route('admin.merek.store')}}">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Merek</label>
                                <input type="text" name="nama_merek" id="nama_merek" class="form-control" required>
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
            <form action="{{ route('admin.merek.update') }}" method="POST">
                @method('patch')
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="merek" class="col-md-3 col-form-label">Merek</label>
                            <div class="col-md-9">
                                <input id="nama_merek" type="text" class="form-control"
                                    name="nama_merek" required>
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
            const modal = $(this);
            
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #nama_merek').val(nama);
        })






        //delete
        $('#modalDelete').on('show.bs.modal', function (e) {
            let id = $(e.relatedTarget).data('id');
            let url = "{{ route('admin.merek.destroy', ':id') }}";
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
