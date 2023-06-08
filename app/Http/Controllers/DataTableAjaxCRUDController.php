<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Http\Request;
use Datatables;

class DataTableAjaxCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Space::select('*'))
                ->addColumn('action', 'company-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('companies');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $companyId = $request->id;

        $company   =   Space::updateOrCreate(
            [
                'id' => $companyId
            ],
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address
            ]
        );

        return Response()->json($company);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $company  = Space::where($where)->first();

        return Response()->json($company);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $company = Space::where('id', $request->id)->delete();

        return Response()->json($company);
    }
}
