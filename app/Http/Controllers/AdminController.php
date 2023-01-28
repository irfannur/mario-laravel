<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Utils;
use function redirect;

class AdminController extends Controller {

    public function logout(Request $request): RedirectResponse {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function profile() {
        $data = User::find(User::getId());
        return view('admin.profile-view', compact('data'));
    }

    public function profile_edit() {
        $data = User::find(User::getId());
        return view('admin.profile-edit', compact('data'));
    }

    public function profile_save(Request $request): RedirectResponse {
        $data = User::find(User::getId());
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('dmYHis') . $data->username;
            $path = public_path('uploads/img_profile');

            if ($file->move($path, $filename)) {
                $pathOldImage = $path . '/' . $data->profile_image;
                if (is_file($pathOldImage)) { //echo '<pre>';print_r($path);die;
                    unlink($pathOldImage);
                }
                $data->profile_image = $filename;
            }
        }

        if ($data->save()) {
            $flash = flashSucces('Success save data.');
        } else {
            $flash = flashFailed('Error save data.');
        }

        return redirect()->route('admin.profile')->with($flash);
    }

}
