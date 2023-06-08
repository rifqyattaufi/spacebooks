<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Space;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function dashboard()
    {
        $data = Space::where('admin_id', auth()->user()->id)->get();

        return view('admin.dashboard', compact('data'));
    }
}
