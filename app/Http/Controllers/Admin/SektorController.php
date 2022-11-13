<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sektor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;



class SektorController extends Controller
{
    // public function sektors()
    // {
    //     Session::put('page', 'sektors');
    //     $sektors = Sektor::get()->toArray();

    //     return view('admin.sektors.sektors')->with(compact('sektors'));
    // }

    // public function updateSektorStatus(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = $request->all();
    //         if ($data['status'] == "Active") {
    //             $status = 0;
    //         } else {
    //             $status = 1;
    //         }
    //         Sektor::where('id', $data['sektor_id'])->update(['status' => $status]);
    //         return response()->json(['status' => $status, 'sektor_id' => $data['sektor_id']]);
    //     }
    // }

    // public function deleteSektor($id)
    // {
    //     Sektor::where('id', $id)->delete();
    //     $message = "Data sektor berhasil dihapus";
    //     return redirect()->back()->with('success_message', $message);
    // }

    // public function addEditSektor(Request $request, $id = null)
    // {
    //     Session::put('page', 'add_edit_sektor');
    //     if ($id == "") {
    //         $title = "Tambah Sektor";
    //         $sektor = new Sektor;
    //         $message = "Sektor berhasil ditambahkan";
    //     } else {
    //         $title = "Edit Sektor";
    //         $sektor = Sektor::find($id);
    //         $message = "Sektor berhasil diupdate";
    //     }

    //     if ($request->isMethod('post')) {
    //         $data = $request->all();
    //         // echo "<pre>";
    //         // print_r($data);
    //         // die;
    //         $rules = [
    //             'nama_sektor' => 'required|regex:/^[\pL\s\-]+$/u',
    //         ];

    //         $customMessages = [
    //             'nama_sektor.required' => 'Kolom nama sektor belum diisi',
    //             'nama_sektor.regex' => 'Kolom nama sektor tidak valid',
    //         ];

    //         $this->validate($request, $rules, $customMessages);

    //         $sektor->nama = $data['nama_sektor'];
    //         $sektor->status = 1;
    //         $sektor->save();

    //         return redirect('admin/sektors')->with('success_message', $message);
    //     }

    //     return view('admin.sektors.add_edit_sektor')->with(compact('title', 'sektor'));
    // }

    public function index()
    {
        // mengambil data dari table books
        $sektors = DB::table('sektors')->get();
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
            DB::table('sektors')->where('id', $data['sektor_id'])->update(['status' => $status]);
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

        DB::table('sektors')->insert([
            'nama' => $request->nama_sektor,
            'status' => 1,
        ]);

        return redirect('admin/sektors')->with('success_message', 'Data sektor berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sektor = DB::table('sektors')->where('id', $id)->first();

        return view('admin.sektors.edit', compact('sektor'));
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

        DB::table('sektors')->where('id', $request->id)->update([
            'nama' => $request->nama_sektor,
        ]);

        return redirect('admin/sektors')->with('success_message', 'Data sektor berhasil diupdate');
    }

    public function delete($id)
    {
        DB::table('sektors')->where('id', $id)->delete();
        $message = "Data sektor berhasil dihapus";
        return redirect()->back()->with('success_message', $message);
    }
}
