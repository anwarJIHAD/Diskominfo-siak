<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\Aplikasi;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //index
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')
            ->when($request->input('name'), function ($query, $doctors_name) {
                return $query->where('doctor_name', 'like', '%' . $doctors_name . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        $aplikasi = DB::table('aplikasis')
            ->when($request->input('name'), function ($query, $nama_aplikasi) {
                return $query->where('nama_aplikasi', 'like', '%' . $nama_aplikasi . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.doctors.index', compact('aplikasi'));

    }
    //create
    public function create()
    {
        return view('pages.doctors.create');
    }
    //store
    public function store(Request $request)
    {
        $request->validate([
            'nama_aplikasi' => 'required',
            'user_id' => 'required',
            'tgl_pengajuan' => 'required',
            'keterangan' => 'required',

        ]);

        $aplikasi = new Aplikasi();
        $aplikasi->nama_aplikasi = $request->nama_aplikasi;
        $aplikasi->user_id = $request->user_id;
        $aplikasi->tgl_pengajuan = $request->tgl_pengajuan;
        $aplikasi->keterangan = $request->keterangan;
        $aplikasi->save();

        return redirect()->route('doctors.index')->with('success', 'Aplikasi created successfully.');
    }
    //edit
    public function edit($id)
    {
        $doctor = doctor::find($id);
        return view('pages.doctors.edit', compact('doctor'));
    }
    public function destroy($id)
    {
        $Aplikasi = Aplikasi::find($id);
        $Aplikasi->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
