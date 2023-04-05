<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Shipment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Shipment::query()->orderBy('id','desc')->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'code' =>$item->code,
                    'total_amount' => $item->total_amount,
                    'created_at'=> $item->created_at->format('d-m-Y'),
                    'status' => $item?->status,
                ];
            })->toArray();
            $data =  response()->json( DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkboxes','dashboard.shipments.datatables.checkbox')
                ->addColumn('action', 'dashboard.shipments.datatables.action') 

                ->addColumn('status','dashboard.shipments.datatables.status')
                ->rawColumns(['action', 'checkboxes','status'])
                ->make(true));
                return $data->original;
        }
        return view('dashboard.shipments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $goods = Goods::get();
       return view('dashboard.shipments.add', compact('goods')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
            $item = Shipment::findorFail($id);
            $item->delete();
            return true;
    }
    public function del_ids(Request $request)
    {
        $item = Shipment::whereIn('id', $request->ids)->delete();
        return true;
    }
}
