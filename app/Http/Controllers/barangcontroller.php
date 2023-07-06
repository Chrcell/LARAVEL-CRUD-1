<?php

namespace App\Http\Controllers;

//import Model "barang
use App\Models\barang;
use Illuminate\View\View;

use Illuminate\Http\Request;

class barangcontroller extends Controller
{
    /**
     * index
     * 
     *  @return view
     */
    public function index(): View
    {

        //render view with posts
        return view('barang.index')->with([
            'barang'=> barang::all(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namabarang' => 'required|min:1',
            'jenis' => 'required|min:1',
            'tgldikirim' => 'required|min:1',
            'tglditerima' => 'required|min:1',
        ]);

        $barang = new barang;
        $barang->namabarang = $request->namabarang;
        
        $barang->jenis = $request->jenis;
        
        $barang->tgldikirim = $request->tgldikirim;
        
        $barang->tglditerima = $request->tglditerima;
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'data ditambah'); 
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        return view('barang.edit')->with([
            'barang'=>barang::find($id),
        ]);
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
        $request->validate([
            'namabarang' => 'required|min:1',
            'jenis' => 'required|min:1',
            'tgldikirim' => 'required|min:1',
            'tglditerima' => 'required|min:1',
        ]);

        $barang = barang::find($id);
        $barang->namabarang = $request->namabarang;
        
        $barang->jenis = $request->jenis;
        
        $barang->tgldikirim = $request->tgldikirim;
        
        $barang->tglditerima = $request->tglditerima;
        $barang->save();

        return to_route('barang.index')->with('success', 'data ditambah'); 
    
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = barang::find($id);
        $barang->delete();

        return back()->with('success', 'data dihapus');
    }
}

