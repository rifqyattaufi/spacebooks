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
        foreach ($popular as $p) {
            $space = Space::where('id', $p->space_id)->first();
            $count = Review::where('space_id', $p->space_id)->count();
            $image = Gallery::where('space_id', $p->space_id)->first();
            $reviews = Review::select('rating', DB::raw('COUNT(*) as rating_count'))
                ->where('space_id', $p->space_id)
                ->groupBy('rating')
                ->orderBy('rating_count', 'desc')
                ->first();
            $space->count = $count;
            if ($image) {
                $space->image = $image->image;
            }
            if ($reviews) {
                $space->rating = $reviews->rating;
            }
            $data[] = $space;
        }

        if (auth()->user()) {
            return view('home', compact('data'));
        }

        $reviews = Review::where('rating', '>=', 4)->inRandomOrder()->limit(3)->join('users', 'users.id', '=', 'reviews.user_id')->get();
        return view('welcome', compact('data', 'reviews'));
    }

    function cariTempat()
    {
        $spaces = Space::whereNotNull('coworking_price')->inRandomOrder()->paginate(9);
        foreach ($spaces as $s) {
            $count = Review::where('space_id', $s->id)->count();
            $image = Gallery::where('space_id', $s->id)->first();
            $reviews = Review::select('rating', DB::raw('COUNT(*) as rating_count'))
                ->where('space_id', $s->id)
                ->groupBy('rating')
                ->orderBy('rating_count', 'desc')
                ->first();
            $s->count = $count;
            if ($image) {
                $s->image = $image->image;
            }
            if ($reviews) {
                $s->rating = $reviews->rating;
            }
        }

        return view('cariTempat', compact('spaces'));
    }
}
