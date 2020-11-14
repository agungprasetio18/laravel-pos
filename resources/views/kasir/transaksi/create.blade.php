@extends('layouts.app')

@section('title', 'Admin - Tambah Transaksi')

@section('active-kasir-transaksi', 'active')


@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form tambah transaksi
                        <button class="btn btn-sm btn-primary shadow-sm float-right" onclick="document.location.href='{{route('kasir.transaksi.index')}}'">
                            <i class="fas fa-chevron-left text-white-50"></i> Back
                        </button>
                    </h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('kasir.transaksi.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="merek" class="col-md-4 col-form-label text-md-right">Barang</label>
                            <div class="col-md-6">
                                <select name="id_barang" id="id_barang" class="form-control" required="true">
                                    <option value=""></option>
                                    @foreach($barangs as $barang)
                                    <option value="{{$barang->id}}" data-harga="{{$barang->harga_barang}}">{{$barang->nama_barang}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah_beli" class="col-md-4 col-form-label text-md-right">Jumlah Beli</label>
                            <div class="col-md-6">
                                <input id="jumlah_beli" type="number" class="form-control" name="jumlah_beli" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_harga" class="col-md-4 col-form-label text-md-right">Total Harga</label>
                            <div class="col-md-6">
                                <input id="total_harga" type="number" class="form-control" name="total_harga" readonly required>
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

@section('js')
<script>

    $('select').change(function(){
        let harga = $(this).find(':selected').data('harga')
            
            $('#jumlah_beli').keyup(function(){
                let jumlah_beli = $('#jumlah_beli').val()
                let total = parseInt(harga) * parseInt(jumlah_beli)
                if (harga == "kosong") {
                    total = ""
                }
                if (jumlah_beli == "") {
                    total = ""
                }
                if(!isNaN(total)){
                    $('#total_harga').val(total)
                }
            })
        })

</script>
@endsection
