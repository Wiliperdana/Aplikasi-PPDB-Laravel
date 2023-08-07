<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahBaris = 15;
        if(strlen($katakunci)) {
            $data = siswa::where('nisn', 'like', "%$katakunci%")
                    ->orwhere('namalengkap', 'like', "%$katakunci%")
                    ->orWhere('namapanggilan', 'like', "%$katakunci%")
                    ->orwhere('tempatlahir', 'like', "%$katakunci%")
                    ->orWhere('email', 'like', "%$katakunci%")
                    ->orwhere('jurusan', 'like', "%$katakunci%")
                    ->orWhere('jeniskelamin', 'like', "%$katakunci%")
                    ->paginate($jumlahBaris);
        } else {
            $data = siswa::orderBy('nisn', 'asc')->paginate($jumlahBaris);
        }
        return view('siswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session()->flash('nisn', $request->nisn);
        Session()->flash('namalengkap', $request->namalengkap);
        Session()->flash('namapanggilan', $request->namapanggilan);
        Session()->flash('tempatlahir', $request->tempatlahir);
        Session()->flash('tanggallahir', $request->tanggallahir);
        Session()->flash('email', $request->email);
        Session()->flash('password', $request->password);
        Session()->flash('jurusan', $request->jurusan);
        Session()->flash('alasan', $request->alasan);
        Session()->flash('jeniskelamin', $request->jeniskelamin);
        Session()->flash('hobi', $request->hobi);

        $request->validate([
            'nisn' => 'required|numeric|unique:siswa,nisn',
            'namalengkap' => 'required',
            'namapanggilan' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'email' => 'required|unique:siswa,email',
            'password' => 'required',
            'jurusan' => 'required',
            'alasan' => 'required',
            'jeniskelamin' => 'required',
            'hobi' => 'required',
        ], [
            'nisn.required' => 'NISN Wajib Diisi',
            'nisn.numeric' => 'NISN Berformat Angka',
            'nisn.unique' => 'NISN Sudah Digunakan',
            'namalengkap.required' => 'Nama Lengkap Wajib Diisi',
            'namapanggilan.required' => 'Nama Panggilan Wajib Diisi',
            'tempatlahir.required' => 'Tempat Lahir Wajib Diisi',
            'tanggallahir.required' => 'Tanggal Lahir Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.unique' => 'Email Sudah Digunakan',
            'password.required' => 'Password Wajib Diisi',
            'jurusan.required' => 'Jurusan Wajib Diisi',
            'alasan.required' => 'Alasan Wajib Diisi',
            'jeniskelamin.required' => 'Jenis Kelamin Wajib Diisi',
            'hobi.required' => 'Hobi Wajib Diisi',
        ]);
        $data = [
            'nisn' => $request->nisn,
            'namalengkap' => $request->namalengkap,
            'namapanggilan' => $request->namapanggilan,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'email' => $request->email,
            'password' => $request->password,
            'jurusan' => $request->jurusan,
            'alasan' => $request->alasan,
            'jeniskelamin' => $request->jeniskelamin,
            'hobi' => $request->hobi,
        ];
        siswa::create($data);
        return redirect()->to('siswa')->with('success', 'Data Pendaftar Berhasil Dikirim');
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
        $data = siswa::where('nisn', $id)->first();
        return view('siswa.edit')->with('data', $data);
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
            'namalengkap' => 'required',
            'namapanggilan' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jurusan' => 'required',
            'alasan' => 'required',
            'jeniskelamin' => 'required',
            'hobi' => 'required',
        ], [
            'namalengkap.required' => 'Nama Lengkap Wajib Diisi',
            'namapanggilan.required' => 'Nama Panggilan Wajib Diisi',
            'tempatlahir.required' => 'Tempat Lahir Wajib Diisi',
            'tanggallahir.required' => 'Tanggal Lahir Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
            'jurusan.required' => 'Jurusan Wajib Diisi',
            'alasan.required' => 'Alasan Wajib Diisi',
            'jeniskelamin.required' => 'Jenis Kelamin Wajib Diisi',
            'hobi.required' => 'Hobi Wajib Diisi',
        ]);
        $data = [
            'namalengkap' => $request->namalengkap,
            'namapanggilan' => $request->namapanggilan,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'email' => $request->email,
            'password' => $request->password,
            'jurusan' => $request->jurusan,
            'alasan' => $request->alasan,
            'jeniskelamin' => $request->jeniskelamin,
            'hobi' => $request->hobi,
        ];
        siswa::where('nisn', $id)->update($data);
        return redirect()->to('siswa')->with('success', 'Berhasil Mengubah Data Pendaftar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        siswa::where('nisn', $id)->delete();
        return redirect()->to('siswa')->with('success', 'Data Pendaftar Berhasil Dihapus'); 
    }
}
