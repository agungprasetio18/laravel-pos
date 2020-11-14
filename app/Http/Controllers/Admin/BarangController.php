<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use App\Distributor;
use App\Merek;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $barangs = Barang::with(['merek','distributor'])->get();
        return view('admin.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mereks = Merek::all();
        $distributors = Distributor::all();
        return view('admin.barang.create', compact('mereks', 'distributors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'nama_barang' => 'required',
            'id_merek' => 'required',
            'id_distributor' => 'required',
            'tanggal_masuk' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'keterangan' => 'required',
        ]);


        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'id_merek' => $request->id_merek,
            'id_distributor' => $request->id_distributor,
            'tanggal_masuk' => $request->tanggal_masuk,
            'harga_barang' => $request->harga_barang,
            'stok_barang' => $request->stok_barang,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.barang.index')->with('success', 'Berhasil menambah barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $mereks = Merek::all();
        $distributors = Distributor::all();
        $barang = Barang::find($id);

        return view('admin.barang.edit', compact('barang','mereks','distributors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'id_merek' => $request->id_merek,
            'id_distributor' => $request->id_distributor,
            'tanggal_masuk' => $request->tanggal_masuk,
            'harga_barang' => $request->harga_barang,
            'stok_barang' => $request->stok_barang,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('admin.barang.index')->with('success', 'Berhasil mengupdate barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
    }
}
