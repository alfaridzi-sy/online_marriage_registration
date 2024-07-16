<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getDataJemaat(){
        // $users = User::where('role', 'Guru')->get();
        // return view('admin.guru.index', ["users" => $users]);
        return view('ketua_stasi.data_jemaat');
    }
}
