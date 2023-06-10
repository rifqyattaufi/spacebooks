<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Space;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $popular = Reservation::select('space_id')
            ->groupBy('space_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(3)
            ->get();

        $data = [];
        foreach ($popular as $p) {
            $data[] = Space::where('id', $p->space_id)->first();
        }

        return view('welcome', compact('data'));
    }
}
