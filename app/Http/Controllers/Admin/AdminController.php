<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        Session::put('page', 'dashboard');
        return view('admin.dashboard');
    }

    public function updateAdminPassword(Request $request)
    {
        Session::put('page', 'update_admin_password');
        if ($request->isMethod('post')) {
            $data = $request->all();
            // cek password lama yang dimasukkan admin jika benar
            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
                // cek jika password baru sama dengan konfirmasi password
                if ($data['confirm_password'] == $data['new_password']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message', 'Password berhasil diupdate');
                } else {
                    return redirect()->back()->with('error_message', 'Password baru dan konfirmasi password anda tidak cocok!');
                }
            } else {
                return redirect()->back()->with('error_message', 'Password lama anda tidak cocok!');
            }
        }
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();

        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function updateAdminProfile(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_phone' => 'required|numeric',
            ];

            $customMessages = [
                'admin_name.required' => 'Kolom nama belum diisi',
                'admin_name.regex' => 'Kolom nama tidak valid',
                'admin_phone.required' => 'Kolom no telp belum diisi',
                'admin_phone.numeric' => 'No telp harus berupa angka',
            ];

            $this->validate($request, $rules, $customMessages);

            // upload photo
            if ($request->hasFile('admin_photo')) {
                $image_tmp = $request->file('admin_photo');
                if ($image_tmp->isValid()) {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate image name
                    $imageName = rand(111, 999999) . '.' . $extension;
                    $imagePath = 'admin/images/photos/' . $imageName;
                    // upload
                    Image::make($image_tmp)->save($imagePath);
                }
            } elseif (!empty($data['current_admin_photo'])) {
                $imageName = $data['current_admin_photo'];
            } else {
                $imageName = "";
            }

            // update profil
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['nama' => $data['admin_name'], 'no_telp' => $data['admin_phone'], 'photo' => $imageName]);
            return redirect()->back()->with('success_message', 'Profil admin berhasil diupdate');
        }
        return view('admin.settings.update_admin_profile');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>";
            // print_r($data);
            // die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
                'email.required' => 'Kolom email belum diisi!',
                'email.email' => 'Email tidak valid!',
                'password.required' => 'Kolom password belum diisi!',
            ];

            $this->validate($request, $rules, $customMessages);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
                return redirect('admin/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'Email atau password tidak valid!');
            }
        }
        return view('admin.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
