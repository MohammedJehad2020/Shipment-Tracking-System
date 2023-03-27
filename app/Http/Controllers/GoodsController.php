<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoodsRequest;
use App\Models\Goods;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class GoodsController extends Controller
{

    protected $model = Goods::class;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Goods::query()->orderBy('id','desc')->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' =>$item->name,
                    'price_from_city_to_city' =>$item->price_from_city_to_city,
                    'price_inside_city'=> $item?->price_inside_city,
                    'price_country_to_country'=> $item?->price_from_country_to_country,
                    'created_at'=> $item->created_at->format('d-m-Y'),
                    'status' => $item?->status,
                ];
            })->toArray();
            $data =  response()->json( DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkboxes','dashboard.goods.datatables.checkbox')
                ->addColumn('action', 'dashboard.goods.datatables.action') 

                ->addColumn('status','dashboard.goods.datatables.status')
                ->rawColumns(['action', 'checkboxes','status'])
                ->make(true));
                return $data->original;
        }
        return view('dashboard.goods.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GoodsRequest $request)
    {
        $goods = parent::saveModel($request, $this->model, '');
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
    public function edit($id)
    {
        $goods = Goods::findOrFail($id);
        return view('components.goods.update-goods', compact('goods'));
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
            $item = Goods::findorFail($id);
            $item->delete();
            return true;
    }
    public function del_ids(Request $request)
    {
        $item = Goods::whereIn('id', $request->ids)->delete();
        return true;
    }
}
