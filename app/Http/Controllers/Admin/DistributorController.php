<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Distributor;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributors = Distributor::all();
        return view('admin.distributor.index', compact('distributors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);

        $distributor = Distributor::create([
            'nama_distributor' => $request->nama_distributor,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
        ]);

        return redirect()->route('admin.distributor.index')->with('success', 'Berhasil menambah distributor');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $distributor = Distributor::find($id);

        $distributor->update([
            'nama_distributor' => $request->nama_distributor,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
        ]);

        return redirect()->route('admin.distributor.index')->with('success', 'Berhasil mengupdate barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $distributor = Distributor::find($id);
        $distributor->delete();
        
    }
}
