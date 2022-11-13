<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function categories()
    // {
    //     $categories = Category::get()->toArray();
    //     // dd($categories);
    //     return view('admin.categories.index')->with(compact('categories'));
    // }

    // public function updateCategoryStatus(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = $request->all();
    //         if ($data['status'] == "Aktif") {
    //             $status = 0;
    //         } else {
    //             $status = 1;
    //         }
    //         Category::where('id', $data['category_id'])->update(['status' => $status]);
    //         return response()->json(['status' => $status, 'category_id' => $data['category_id']]);
    //     }
    // }
}
