<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transaksi = Transaksi::get();
        return response()->json($transaksi);
        //
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
           
            
            
          
        ]);

        try {

            $created = Transaksi::create([
                'nama'      => $request->nama,
                'deskripsi'      => $request->deskripsi,
                'harga'      => $request->harga,
                'total_harga'      => $request->total_harga,
            ]);
    
            return response()->json($created,201);
                   

        } catch (\Exception $e) {
    
            return response()->json($e, 400);
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{

            $transaksi = Transaksi::find($id);
           
            return response()->json($transaksi);

        } catch (\Exception $e) {
             return response()->json($e);
        }
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
    public function update(Request $request, $id)
    {
        try {
            $transaksi = Transaksi::find($id);
            // $produk = Produk::where('nama',$nama)->first();
            
            $transaksi->nama = $request->nama;
            $transaksi->deskripsi = $request->deskripsi;
            $transaksi->harga = $request->harga;
            $transaksi->total_harga = $request->total_harga;

            $transaksi->save();

            return response()->json($transaksi);

        } catch (\Exception $e) {
            return response()->json($e,400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $transaksi=Transaksi::find($id);
            $transaksi->delete();
            return response()->json('Success',201);

        } catch (\Exception $e) {
            return response()->json($e,400);
        }
    }
}
