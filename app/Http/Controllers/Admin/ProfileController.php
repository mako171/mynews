<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // 以下を追記
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        // admin/profile/createにリダイレクトする
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        // admin/profile/createにリダイレクトする
        return redirect('admin/profile/edit');
    }
}
