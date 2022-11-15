<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sektor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SektorController extends Controller
{
    public function index()
    {
        // mengambil data dari table sektors
        $sektors = Sektor::get()->toArray();
        // dd($sektors);
        return view('admin.sektors.index')->with(compact('sektors'));
    }

    public function updateSektorStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Sektor::where('id', $data['sektor_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'sektor_id' => $data['sektor_id']]);
        }
    }

    public function add()
    {
        return view('admin.sektors.add');
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_sektor' => 'required|regex:/^[\pL\s\-]+$/u',
        ];

        $customMessages = [
            'nama_sektor.required' => 'Kolom nama sektor belum diisi',
            'nama_sektor.regex' => 'Kolom nama sektor tidak valid',
        ];
        $this->validate($request, $rules, $customMessages);

        Sektor::insert([
            'nama' => $request->nama_sektor,
            'status' => 1,
        ]);

        return redirect('admin/sektors')->with('success_message', 'Data kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sektor = Sektor::where('id', $id)->first();
        // dd($sektor);
        return view('admin.sektors.edit')->with(compact('sektor'));
    }

    public function update(Request $request)
    {
        $rules = [
            'nama_sektor' => 'required|regex:/^[\pL\s\-]+$/u',
        ];

        $customMessages = [
            'nama_sektor.required' => 'Kolom nama sektor belum diisi',
            'nama_sektor.regex' => 'Kolom nama sektor tidak valid',
        ];
        $this->validate($request, $rules, $customMessages);

        Sektor::where('id', $request->id)->update([
            'nama' => $request->nama_sektor,
        ]);

        return redirect('admin/sektors')->with('success_message', 'Data sektor berhasil diupdate');
    }

    public function delete($id)
    {
        Sektor::where('id', $id)->delete();
        $message = "Data sektor berhasil dihapus";
        return redirect()->back()->with('success_message', $message);
    }
}
