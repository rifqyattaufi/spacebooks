<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Space;

class AdminController extends Controller
{
    public function index()
    {
        $data = Space::where('admin_id', auth()->user()->id)->first();

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
}
