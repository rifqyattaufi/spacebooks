<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\Space;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

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

    function cariTempat(Request $request)
    {
        $spaces = Space::when($request->type === 'meeting', function ($query) {
            return $query->whereNotNull('meeting_price');
        })
            ->unless($request->type === 'meeting', function ($query) {
                return $query->whereNotNull('coworking_price');
            })
            ->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'like', "%{$request->search}%");
            })
            ->inRandomOrder()
            ->paginate(9);
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

    function detailTempat($id, $type = null)
    {
        $space = Space::where('id', $id)->first();
        $images = Gallery::where('space_id', $id)->inRandomOrder()->limit(3)->get();
        $reviews = Review::where('space_id', $id)->join('users', 'users.id', '=', 'reviews.user_id')->inRandomOrder()->limit(4)->get();
        $count = Review::where('space_id', $id)->count();
        $facilitys = Facility::where('space_id', $id)->get();

        $week = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $start = array_search($space->open_day, $week);
        $end = array_search($space->close_day, $week);
        $id = CarbonImmutable::now();
        $id->startOfWeek()->now();
        $date = array_fill(0, 7, "");
        $start_day = array_search($id->isoFormat('dddd'), $week);
        $j = $start_day;
        for ($i = 0; $i < 7; $i++) {
            if ($j > 6) {
                $j = 0;
            }
            $date[$j] = $id->addDay($i)->isoFormat('D-MMMM');
            $j++;
        }
        $jadwal = [];
        foreach ($date as $key => $d) {
            $jadwal[$key] = Reservation::where('space_id', $space->id)->where('reserve_date', $d)->pluck('reserve_time')->toArray();
        }

        return view('detailTempat', compact('space', 'images', 'reviews', 'type', 'start', 'end', 'week', 'date','jadwal', 'facilitys'));
    }
}
