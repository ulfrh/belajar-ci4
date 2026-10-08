<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    public function index()
    {
        $m = new MahasiswaModel();

        $data['mahasiswa'] = $m->findAll();

        return view('mahasiswa/index', $data);
    }

    public function tambah()
    
    {
        if (!session()->get('isLogin')) {
    return redirect()->to('/login');
}
        return view('mahasiswa/tambah');
    }

   public function simpan()
{
    if (!session()->get('isLogin')) {
    return redirect()->to('/login');
}
    if (!$this->validate([
        'nim' => 'required|min_length[9]|is_unique[mahasiswa.nim]',
        'nama' => 'required|min_length[3]',
    ])) {
        return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $m = new MahasiswaModel();

    $m->insert([
        'nim' => $this->request->getPost('nim'),
        'nama' => $this->request->getPost('nama'),
        'alamat' => $this->request->getPost('alamat')
    ]);

    return redirect()->to('/mahasiswa')
        ->with('pesan', 'Data berhasil ditambahkan');
}
    public function edit($id)
    
{
    if (!session()->get('isLogin')) {
    return redirect()->to('/login');
}
    $m = new MahasiswaModel();

    $data['mhs'] = $m->find($id);

    if (!$data['mhs']) {
        return redirect()->to('/mahasiswa');
    }

    return view('mahasiswa/edit', $data);
}
public function update($id)
{
    if (!session()->get('isLogin')) {
    return redirect()->to('/login');
}
    $m = new MahasiswaModel();

    if (!$this->validate([
        'nim' => 'required|min_length[9]|is_unique[mahasiswa.nim,id,' . $id . ']',
        'nama' => 'required|min_length[3]',
    ])) {
        return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $m->update($id, [
        'nim' => $this->request->getPost('nim'),
        'nama' => $this->request->getPost('nama'),
        'alamat' => $this->request->getPost('alamat')
    ]);

    return redirect()->to('/mahasiswa')
        ->with('pesan', 'Data berhasil diubah');
}
public function hapus($id)
{
    if (!session()->get('isLogin')) {
    return redirect()->to('/login');
}
    $m = new MahasiswaModel();

    $m->delete($id);

return redirect()->to('/mahasiswa')
    ->with('pesan', 'Data berhasil dihapus');
}
}