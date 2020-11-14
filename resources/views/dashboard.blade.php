@extends('layouts.app')

@section('active-dashboard', 'active')

@role('admin')
    @section('title', 'Admin - Dashboard')
@elserole('manager')
    @section('title', 'Manager - Dashboard')
@elserole('kasir')
    @section('title', 'Kasir - Dashboard')
@endrole

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Hallo, {{ Auth::user()->name }}
                </h6>
            </div>
            <div class="card-body">
            Segala aktivitas yang Anda lakukan di area ini menjadi tanggung jawab anda sepenuhnya. Silahkan lakukan dengan teliti dan benar.
            </div>
        </div>
    </div>
</div>
@endsection