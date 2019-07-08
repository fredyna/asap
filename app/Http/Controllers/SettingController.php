<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Alert;
use App\Log;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $data['user'] = User::find($request->user()->id);
        return view('setting.user.profile')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email'
        ]);

        $user = User::find($request->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;

        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Edit profil',
        ];

        if ($user->save()) {
            $data_log['description'] = 'Berhasil mengedit data profil';
            Alert::success('Update Sukses!', 'Berhasil update profil');
        } else {
            $data_log['description'] = 'Gagal mengedit data profil';
            Alert::error('Update Gagal', 'Gagal update profil');
        }

        Log::create($data_log);
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'r_password' => 'required|same:password'
        ]);

        $user = User::find($request->user()->id);
        $user->password = bcrypt($request->password);

        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Ganti password',
        ];

        if ($user->save()) {
            $data_log['description'] = 'Berhasil mengganti password';
            Alert::success('Update Sukses!', 'Berhasil update password');
        } else {
            $data_log['description'] = 'Gagal mengganti password';
            Alert::error('Update Gagal', 'Gagal update password');
        }

        Log::create($data_log);
        return redirect()->back();
    }
}
