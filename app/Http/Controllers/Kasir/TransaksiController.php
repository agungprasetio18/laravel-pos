<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;
use App\Barang;
use Auth;

class TransaksiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transaksis = Transaksi::select(['id_transaksi','tanggal_beli'])->distinct()->get();

        return view('kasir.transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();

        return view('kasir.transaksi.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = Transaksi::orderBy('created_at', 'desc')->first();
 
        if (!$model) {
            $number = 0;
        } else {
            $number = $model->id;
        }
        $kd_transaksi = sprintf('TRS%03d', intval($number)); 

        $transaksi = Transaksi::create([
            'id_transaksi' => $kd_transaksi,
            'id_barang' => $request->id_barang,
            'id_user' =>  Auth::user()->id,
            'jumlah_beli' => $request->jumlah_beli,
            'total_harga' => $request->total_harga,
            'tanggal_beli' => date('Y-m-d'),
        ]);
        return redirect()->route('kasir.transaksi.index')->with('success', 'Berhasil menambah Transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id_transaksi)
    {
        $transaksis = Transaksi::with(['barang','user'])->where('id_transaksi', $id_transaksi)->orderBy('created_at', 'ASC')->get();
        return view('kasir.transaksi.detail', compact('transaksis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add($id_transaksi)
    {
        $barangs = Barang::all();
        return view('kasir.transaksi.add', compact('id_transaksi', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addstore(Request $request, $id_transaksi)
    {
        $transaksi = Transaksi::create([
            'id_transaksi' => $id_transaksi,
            'id_barang' => $request->id_barang,
            'id_user' =>  Auth::user()->id,
            'jumlah_beli' => $request->jumlah_beli,
            'total_harga' => $request->total_harga,
            'tanggal_beli' => date('Y-m-d'),
        ]);
        return redirect()->route('kasir.transaksi.index')->with('success', 'Berhasil menambah Transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
