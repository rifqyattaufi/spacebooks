<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Space;

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
}
