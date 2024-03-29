<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Space;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $data = Space::where('admin_id', auth()->user()->id)->first();
        if ($data != null) {
            $facility = Facility::where('space_id', $data->id)->get();
            return view('admin.index', compact('data', 'facility'));
        }

        return view('admin.index', compact('data'));
    }

    public function addSpace()
    {
        return view('admin.spaces-add');
    }

    public function storeSpace(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric|digits_between:10,14',
            'capacity' => 'required',
            'description' => 'required',
            'open_day' => 'required',
            'open_time' => 'required',
            'close_day' => 'required',
            'close_time' => 'required',
        ]);

        Space::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'capacity' => $request->capacity,
            'description' => $request->description,
            'open_day' => $request->open_day,
            'open_time' => $request->open_time,
            'close_day' => $request->close_day,
            'close_time' => $request->close_time,
            'admin_id' => auth()->user()->id,
        ]);

        return redirect()->route('admin.index')->with('success', 'Space added successfully');
    }

    public function getPrice(Request $request)
    {
        $space = Space::where('id', $request->id)->first();

        return response()->json($space);
    }

    public function updatePrice(Request $request)
    {
        Space::where('id', $request->id)->update([
            'coworking_price' => $request->coworking_price,
            'meeting_price' => $request->meeting_price,
        ]);

        return Response()->json(['success' => 'Price updated successfully']);
    }

    public function updateFacility(Request $request)
    {
        foreach ($request->facility as $key => $r) {
            if ($r == null && $request->id[$key] != null) {
                Facility::where('id', $request->id[$key])->delete();
                continue;
            } else if ($r == null && $request->id[$key] == null) {
                continue;
            }
            Facility::updateOrInsert([
                'space_id' => $request->space_id,
                'id' => $request->id[$key],
            ], [
                'name' => $r,
            ]);
        }

        return Response()->json(['success' => 'Facility updated successfully']);
    }

    public function updatePhone(Request $request)
    {
        $rules = [
            'phone' => 'required|numeric|digits_between:10,14',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->getMessageBag()->first(), 400);
        }

        Space::where('id', $request->space_id)->update([
            'phone' => $request->phone,
        ]);

        return Response()->json(['success' => 'Phone updated successfully']);
    }

    public function gallery()
    {
        $data = Space::where('admin_id', auth()->user()->id)->first();
        $image = Gallery::where('space_id', $data->id)->get();


        return view('admin.gallery', compact('data', 'image'));
    }

    public function addGallery(Request $request)
    {

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $imageName = date('d_m_y') . '_' . time() . '_' . $request->file('image')->getClientOriginalName();

        $request->image->move(public_path('images'), $imageName);

        Gallery::create([
            'space_id' => $request->space_id,
            'image' => $imageName,
        ]);

        return response()->json(['success' => 'Image added successfully']);
    }

    public function deleteGallery(Request $request)
    {
        $image = Gallery::where('id', $request->id)->first();
        unlink(public_path('images/' . $image->image));
        Gallery::where('id', $request->id)->delete();

        return response()->json(['success' => 'Image deleted successfully']);
    }

    public function jadwal(Request $request)
    {
        $data = Space::where('admin_id', auth()->user()->id)->first();
        $week = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $start = array_search($data->open_day, $week);
        $end = array_search($data->close_day, $week);
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
            $jadwal[$key] = Reservation::where('space_id', $data->id)
                ->when($request->type === 'meeting', function ($query) {
                    return $query->where('type', 1);
                })
                ->unless($request->type === 'meeting', function ($query) {
                    return $query->where('type', 0);
                })
                ->where('reserve_date', $d)->pluck('reserve_time')->toArray();
        }

        return view('admin.jadwal', compact('data', 'week', 'start', 'end', 'date', 'jadwal'));
    }

    public function addJadwal(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            return response()->json('User not found', 404);
        }

        Reservation::create([
            'reserve_time' => $request->reserve_time,
            'reserve_date' => $request->reserve_date,
            'type' => $request->type,
            'user_id' => $user->id,
            'space_id' => $request->space_id,
        ]);

        return response()->json('Reservation added successfully');
    }

    function deleteJadwal(Request $request)
    {
        Reservation::where('reserve_time', $request->reserve_time)
            ->where('reserve_date', $request->reserve_date)
            ->where('space_id', $request->space_id)
            ->where('type', $request->type)
            ->delete();

        return response()->json('Reservation deleted successfully');
    }

    public function updateAddress(Request $request)
    {
        $rules = [
            'address' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->getMessageBag()->first(), 400);
        }

        Space::where('id', $request->space_id)->update([
            'address' => $request->address,
        ]);

        return Response()->json(['success' => 'Address updated successfully']);
    }

    public function updateOpenClose(Request $request)
    {
        $rules = [
            'open_day' => 'required',
            'open_time' => 'required',
            'close_day' => 'required',
            'close_time' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->getMessageBag()->first(), 400);
        }

        Space::where('id', $request->space_id)->update([
            'open_day' => $request->open_day,
            'open_time' => $request->open_time,
            'close_day' => $request->close_day,
            'close_time' => $request->close_time,
        ]);

        return Response()->json(['success' => 'Open and close time updated successfully']);
    }
}   
