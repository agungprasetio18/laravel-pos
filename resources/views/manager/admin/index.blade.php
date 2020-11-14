@extends('layouts.app')

@section('title', 'Manager - Tambah Admin')

@section('active-manager-admin', 'active')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Baru Untuk Admin</h1>
    <button onclick="document.location.href='{{route('manager.admin.create')}}'"
        class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</button>
</div>
<div class="row">
    <div class="col-lg-12">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show wow slideInDown" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ section('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card mb-4 shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data User Admin</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $admins as $admin )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
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
                                            <a href="#hapus" type="button" class="dropdown-item" data-toggle="modal"
                                                data-target="#modalHapus" data-id="{{$admin->id}}">
                                                Hapus
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

<!-- MODAL HAPUS -->
<div class="modal fade" id="modalHapus" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHapusLabel">Delete Kasir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin untuk menghapus user ini?
            </div>
            <form action="{{ route('manager.admin.destroy', $admin->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection