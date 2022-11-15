<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sektor;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        // mengambil data dari table categories
        $categories = Category::with('sektor')->get()->toArray();
        // dd($categories);
        return view('admin.categories.index')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Category::where('id', $data['category_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'category_id' => $data['category_id']]);
        }
    }

    public function add()
    {
        $getSektors = Sektor::get()->toArray();
        $getCategories = array();
        return view('admin.categories.add')->with(compact('getCategories', 'getSektors'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_kategori' => 'required|min:3',
            'sektor_id' => 'required',
            'deskripsi' => 'required',
        ];

        $customMessages = [
            'nama_kategori.required' => 'Kolom nama kategori belum diisi',
            'nama_kategori.min' => 'Nama kategori minimal 3 karakter',
            'sektor_id.required' => 'Anda belum memilih kategori sektor',
            'deskripsi.required' => 'Kolom deskripsi belum diisi',
        ];
        $this->validate($request, $rules, $customMessages);

        Category::insert([
            'nama_kategori' => $request->nama_kategori,
            'sektor_id' => $request->sektor_id,
            'deskripsi' => $request->deskripsi,
            'status' => 1,
        ]);

        return redirect('admin/categories')->with('success_message', 'Data kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        $getSektors = Sektor::get()->toArray();
        $getCategories = Category::where(['sektor_id' => $category['sektor_id']])->get();
        // $getCategories = json_decode(json_encode($getCategories), true);
        return view('admin.categories.edit')->with(compact('category', 'getSektors', 'getCategories'));
    }

    public function update(Request $request)
    {
        $rules = [
            'nama_kategori' => 'required|min:3',
            'sektor_id' => 'required',
            'deskripsi' => 'required',
        ];

        $customMessages = [
            'nama_kategori.required' => 'Kolom nama kategori belum diisi',
            'nama_kategori.min' => 'Nama kategori minimal 3 karakter',
            'sektor_id.required' => 'Anda belum memilih kategori sektor',
            'deskripsi.required' => 'Kolom deskripsi belum diisi',
        ];
        $this->validate($request, $rules, $customMessages);

        Category::where('id', $request->id)->update([
            'nama' => $request->nama_kategori,
            'sektor_id' => $request->sektor_id,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('admin/categories')->with('success_message', 'Data kategori berhasil diupdate');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();
        $message = "Data kategori berhasil dihapus";
        return redirect()->back()->with('success_message', $message);
    }

    // public function appendCategoryLevel(Request $request, $id)
    // {
    //     if ($request->ajax()) {
    //         $data = $request->all();
    //         $category = Category::where('id', $id)->first();
    //         $getCategories = Category::with('subcategories')->where(['parent_id' => 0, 'sektor_id' => $data['sektor_id']])->get()->toArray();

    //         return view('admin.categories.append_categories_level')->with(compact('category', 'getCategories'));
    //     }
    // }
}
