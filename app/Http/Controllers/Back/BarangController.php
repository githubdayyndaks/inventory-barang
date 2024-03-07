<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\BarangRequest;
use App\Http\Requests\Request\BarangUpdateRequest;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Ruangan;
use App\Models\Subkategori;
use App\Models\User;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        return view('back.barang.index',[
        'barang' => Barang::with(['Ruangan', 'Kategori', 'Subkategori', 'User'])->get()
        ]);
    }

    public function create()
    {
        $kategori = Kategori::all();
        $subkategori = Subkategori::all()->groupBy('kode_kategori');
        $user = User::all();
        $ruangan = Ruangan::all();
    
        $formattedSubkategori = [];
        foreach ($subkategori as $group) {
            foreach ($group as $item) {
                $formattedSubkategori[] = $item;
            }
        }
    
        return view('back.barang.create', [
            'barang'      => Barang::get(),
            'ruangan'     => $ruangan,
            'kategori'    => $kategori,
            'subkategori' => $formattedSubkategori,
            'User'        => $user
        ]);
    }
    

    public function getSubkategori($kode_kategori)
    {
        try {
            $subkategori = Subkategori::where('kode_kategori', $kode_kategori)->get();
            return response()->json($subkategori);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function getMerkJenis($kode_subkategori)
    {
        try {
            $subkategori = Subkategori::where('kode_subkategori', $kode_subkategori)->first();
            if ($subkategori) {
                $data = [
                    'merk' => $subkategori->merk,
                    'jenis' => $subkategori->jenis,
                ];
                return response()->json([$data]);
            } else {
                return response()->json(['error' => 'Data not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function show(string $kode_barang)
    {
        return view('back.barang.show',[
        'barang' => Barang::with(['Ruangan', 'Kategori', 'Subkategori', 'User'])->find($kode_barang)
        ]);
    }


    public function store(BarangRequest $request)
    {
        // Pastikan pengguna telah login
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Anda harus login untuk melakukan tindakan ini.');
        }
    
        // Validasi data dari request
        $data = $request->validated();
    
        // Mengisi id_user dari pengguna yang sedang login
        $data['id_user'] = auth()->user()->id_user;
    
        // Membuat record baru menggunakan Eloquent
        Barang::create($data);
    
        return redirect(url('barang'))->with('success', 'Data Barang has been created'); 
    }
    

    public function edit($kode_barang){
        return view('back.barang.update', [
            'barang'    => Barang::find($kode_barang),
            'ruangan'     => Ruangan::get(),
            'kategori'    => Kategori::get(),
            'subkategori' => Subkategori::get(),
            'User'        => User::get()
        ]);
    }
    public function update(BarangUpdateRequest $request, string $kode_barang){
        $data = $request->validated();
    
        // Mengisi id_user dari pengguna yang sedang login
        $data['id_user'] = auth()->user()->id_user;
    
        // Membuat record baru menggunakan Eloquent
        Barang::find($kode_barang)->update($data);
        
        return redirect(url('barang'))->with('success', 'Data Barang has been Update'); 
    }

    public function destroy(string $kode_barang)
    {
        $data = Barang::find($kode_barang);
    
        if ($data) {
            $data->delete();
    
            return response()->json([
                "message" => 'Data Barang has been deleted'
            ]);
        } else {
            return response()->json([
                "message" => 'Data Barang not found'
            ], 404); // Return 404 Not Found jika data tidak ditemukan
        }
    }
}
