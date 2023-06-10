<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Review;
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
        foreach ($popular as $key => $p) {
            $space = Space::where('id', $p->space_id)->first();
            $count = Review::where('space_id', $p->space_id)->count();
            $space->count = $count;
            $data[] = $space;
        }

        return view('welcome', compact('data'));
    }

    function home()
    {
        return view('home');
    }
}
