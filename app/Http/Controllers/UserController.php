<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Alert;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Log;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(Request $request)
    {
        $search = !empty($request->get('search')) ? $request->get('search') : null;

        $data['users'] = User::where('role', 'member')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
                $query->orWhere('email', 'like', "%{$search}%");
            })->paginate(10);
        $data['search'] = $search;

        return view('user.index')->with($data);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'r_password' => 'required|same:password'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => Carbon::Now()
        ];

        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Tambah User',
        ];

        $user = User::create($data);
        if ($user) {
            $data_log['description'] = 'Berhasil menambah data user';
            Alert::success('Tambah Sukses', 'Tambah data user sukses');
        } else {
            $data_log['description'] = 'Gagal menambah data user';
            Alert::error('Tambah Gagal', 'Tambah data user gagal');
        }

        Log::create($data_log);
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('user.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
            'r_password' => 'required_with:password|same:password'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Edit User',
        ];

        if ($user->save()) {
            $data_log['description'] = 'Berhasil mengedit data user dengan id ' . $user->id;
            Alert::success('Update Sukses', 'Update data user sukses');
        } else {
            $data_log['description'] = 'Gagal mengedit data user dengan id ' . $user->id;
            Alert::error('Update Gagal', 'Update data user gagal');
        }

        Log::create($data_log);
        return redirect()->route('user.index');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $data_log = [
            'user_id' => $request->user()->id,
            'name'  => 'Hapus User',
        ];

        if ($user->delete()) {
            $data_log['description'] = 'Berhasil menghapus data user dengan id ' . $user->id;
            Alert::success('Hapus Sukses!', 'Sukses hapus data user.');
        } else {
            $data_log['description'] = 'Gagal menghapus data user dengan id ' . $user->id;
            Alert::error('Hapus Gagal!', 'Gagal hapus data user.');
        }

        Log::create($data_log);
        return redirect()->back();
    }
}
