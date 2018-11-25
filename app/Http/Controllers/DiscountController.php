<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale = Discount::all();

        return response()->json($sale,200);
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
        //POST
        $this->validate($request, [
            'nama_diskon'      => 'required',
            'jumlah_diskon'         => 'required',
        ]);

        try {

            $sale = Discount::create([
                'nama_diskon'      => $request->nama_diskon,
                'jumlah_diskon'      => $request->jumlah_diskon,
            ]);
    
            return response()->json($sale,201);
                   

        } catch (\Exception $e) {
    
            return response()->json($e, 400);
        }
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

            $sale = Discount::find($id);
           
            return response()->json($sale);

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
        //PUT
        try {
            $sale = Discount::find($id);
            // $produk = Produk::where('nama',$nama)->first();
            
            $sale->nama_diskon = $request->nama_diskon;
            $sale->jumlah_diskon = $request->jumlah_diskon;
        

            $sale->save();

            return response()->json($sale);

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
        //DELETE
        try {

            $sale=Discount::find($id);
            $sale->delete();
            return response()->json('Success',201);

        } catch (\Exception $e) {
            return response()->json($e,400);
        }
    }
}
