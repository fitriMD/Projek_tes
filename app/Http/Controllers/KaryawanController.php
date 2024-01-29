<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $karyawan = Karyawan::all(); // Mengambil semua isi tabel
        $posts = Karyawan::orderBy('nama', 'asc')->paginate(6);
        return view('karyawan.index', compact('karyawan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'jenis_kelamin' => 'required',

        ]);

        $karyawan = new Karyawan();
        $karyawan->nik = $request->get('nik');
        $karyawan->nama = $request->get('nama');
        $karyawan->status = $request->get('status');
        $karyawan->jenis_kelamin = $request->get('jenis_kelamin');
        $karyawan->save();
        
        if ($karyawan) {
            Session::flash('success','Data Karyawan Berhasil Ditambahkan');
            return redirect('daftarKaryawan');
        } else {
            Session::flash('failed','Data Karyawan Gagal Ditambahkan');
            return redirect()->route('karyawan.create');
        }

        // Karyawan::create([
        //     'nik' => $request->nik,
        //     'nama' => $request->nama,
        //     'status' => $request->status,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        // ]);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        // return 'Data Berhasil Ditambahkan';
        // return redirect()->route('dataPetani.index')
        //     ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $karyawan = Karyawan::find($id);
        return view('karyawan.detail', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karyawan = Karyawan::find($id);

        return view('karyawan.update', ['karyawan' => $karyawan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nik)
    {
        $karyawan = Karyawan::find($nik);
        $karyawan->nik = $request->nik;
        $karyawan->nama = $request->nama;
        $karyawan->status = $request->status;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->save();

        return redirect('daftarKaryawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nik)
    {
        Karyawan::find($nik)->delete();
        return redirect('daftarKaryawan')
        ->with('success', 'Data Berhasil Dihapus');
    }
}
