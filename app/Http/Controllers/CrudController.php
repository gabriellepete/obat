<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas= Crud::orderBy('Kode_Obat' , 'ASC')->paginate(10);
        return view('Crud.show')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this -> validate($request, [
            'Nama_Obat'=>'required',
            'Jenis_Obat'=>'required',
            'Katagori'=>'required',
            'Harga_Obat'=>'required',
            'Jumlah_Obat'=>'required',
        ]);
        
        $tambah = new Crud();
        $tambah->Nama_Obat= $request['Nama_Obat'];
        $tambah->Jenis_Obat = $request['Jenis_Obat'];
        $tambah->Katagori= $request['Katagori'];
        $tambah->Harga_Obat = $request['Harga_Obat'];
        $tambah->Jumlah_Obat= $request['Jumlah_Obat'];
        $tambah->save();

        return redirect()->to('/');
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
        $tampiledit =Crud::where('Kode_Obat', $id)->first();
        return view ('Crud.edit')->with('tampiledit', $tampiledit);
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
        $this -> validate($request, [
            'Nama_Obat'=>'required',
            'Jenis_Obat'=>'required',
            'Katagori'=>'required',
            'Harga_Obat'=>'required',
            'Jumlah_Obat'=>'required',
        ]);
        $update = Crud::where('Kode_Obat', $id)->first();
        $update->Nama_Obat= $request['Nama_Obat'];
        $update->Jenis_Obat = $request['Jenis_Obat'];
        $update->Katagori= $request['Katagori'];
        $update->Harga_Obat = $request['Harga_Obat'];
        $update->Jumlah_Obat= $request['Jumlah_Obat'];
        $update->update();

        return redirect()->to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Crud::find($id);
        $hapus->delete();

        return redirect()->to('/');
    }
}
