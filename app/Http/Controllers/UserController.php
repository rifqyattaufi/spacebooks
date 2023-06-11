<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $image = Gallery::where('space_id', $p->space_id)->first();
            $reviews = Review::select('rating', DB::raw('COUNT(*) as rating_count'))
                ->where('space_id', $p->space_id)
                ->groupBy('rating')
                ->orderBy('rating_count', 'desc')
                ->first();
            $space->count = $count;
            $space->image = $image->image;
            $space->rating = $reviews->rating;
            $data[] = $space;
        }

        $reviews = Review::where('rating', '>=', 4)->inRandomOrder()->limit(3)->join('users', 'users.id', '=', 'reviews.user_id')->get();
        return view('welcome', compact('data', 'reviews'));
    }

    function home()
    {
        return view('home');
    }
}
