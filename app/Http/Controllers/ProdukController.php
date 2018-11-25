<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produk = Produk::get();
        return response()->json($produk);
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
            'nama'      => 'required',
            'deskripsi'         => 'required',
            'harga'      => 'required',
        ]);

        try {

            $created = Produk::create([
                'nama'      => $request->nama,
                'deskripsi'      => $request->deskripsi,
                'harga'      => $request->harga,
                'tipe'      => $request->tipe,
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

            $produk = Produk::find($id);
           
            return response()->json($produk);

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
            $produk = Produk::find($id);
            // $produk = Produk::where('nama',$nama)->first();
            
            $produk->nama = $request->nama;
            $produk->deskripsi = $request->deskripsi;
            $produk->harga = $request->harga;
            $produk->tipe = $request->tipe;

            $produk->save();

            return response()->json($produk);

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

            $produk=Produk::find($id);
            $produk->delete();
            return response()->json('Success',201);

        } catch (\Exception $e) {
            return response()->json($e,400);
        }
    }
}
