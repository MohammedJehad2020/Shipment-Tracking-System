<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipmentRequest;
use App\Models\Goods;
use App\Models\Shipment;
use App\Models\ShipmentData;
use App\Models\ShipmentGoods;
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
    public function store(ShipmentRequest $request)
    {
        $shipment = Shipment::create([
            'code' => $this->generateShipmentCode(),
            'shipment_type'=> $request->shipment_type,
            'total_amount'=> $request->finalTotal,
            'status' => $request->status,
        ]);
        $this->addShipmentData($request, $shipment->id);
        $this->addShipmentGoods($request->kt_ecommerce_add_category_conditions, $shipment->id);

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
    public function edit(Request $request, $id)
    {
        $shipment = Shipment::with(['shipmentData', 'goods'])->findOrFail($id);
        $goods = Goods::get();
        $shipmentGoods = $shipment->goods;

       return view('dashboard.shipments.edit', compact('shipment', 'goods', 'shipmentGoods')); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShipmentRequest $request, string $id)
    {
       $shipment = Shipment::with(['shipmentData', 'goods'])->findOrFail($id);
       $shipment->update([
        'shipment_type'=> $request->shipment_type,
        'total_amount'=> $request->finalTotal,
        'status' => $request->status,
    ]);
    $this->addShipmentData($request, $shipment->id);
    $this->addShipmentGoods($request->kt_ecommerce_add_category_conditions, $shipment->id);

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

    public function addShipmentData($request, $shipment_id)
    {
        ShipmentData::updateOrCreate(
            [
              'shipment_id'=> $shipment_id,
            ],[
               'sender_name'=>$request->sender_name,
               'sender_phone'=>$request->sender_phone,
               'sender_address'=>$request->sender_address,
               'sender_location'=>$request->sender_location,
               'recipient_name'=>$request->recipient_name,
               'recipient_phone'=>$request->recipient_phone,
               'recipient_address'=>$request->recipient_address,
               'recipient_location'=>$request->recipient_location,
            ]);
    }   

    public function addShipmentGoods($goodsArray, $shipment_id)
    {
        $shipmentGoods = ShipmentGoods::where('shipment_id', $shipment_id)->get();
        if($goodsArray==null && $shipmentGoods) {
           foreach($shipmentGoods as $goods){
              $goods->delete();
           }
        }else{
            $goods_ids = ShipmentGoods::where('shipment_id', $shipment_id)->pluck('goods_id')->toArray();
        foreach($goodsArray as $goods){
            if(!in_array($goods['goods_id'], $goods_ids)){

                $t = ShipmentGoods::where('goods_id', $goods['goods_id'])
                ->where('shipment_id', $shipment_id)
                ->delete();
                // dd($t);

            }
            $shipmentGoods = ShipmentGoods::updateOrCreate(
                [
                  'shipment_id'=> $shipment_id,
                  'goods_id'=> $goods['goods_id'],
                ],
                [
                'shipment_id'=> $shipment_id,
                'goods_id'=> $goods['goods_id'],
                'price'=> $goods['price'],
                'weight'=> $goods['weight'],
                'total'=> $goods['total'],
            ]);

        }
        }
        
    }

    public function generateShipmentCode()
    {
        $model = Shipment::withTrashed()->latest()->first();
        if ($model == null) {
            $code = now()->format('Ym').'00001';
        } else {
            $n = substr($model->code, 7, 11);
            $part_number = (int)$n;
            $part_number++;
            $number = str_pad( $part_number, 5, "0", STR_PAD_LEFT );
            $code = now()->format('Ym'). $number;
        }
        return (string) $code;
    }
}
