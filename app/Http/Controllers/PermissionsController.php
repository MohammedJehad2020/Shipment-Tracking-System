<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionsRequest;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionsController extends Controller
{
    protected $model = Permission::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Permission::query()->with(['roles'])->orderBy('id','desc')->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' =>$item->name,
                    'assigned_to' => $item->roles->pluck('name')->toArray(),
                    'created_at'=> $item->created_at->format('d-m-Y'),
                ];
            })->toArray();
            $data =  response()->json( DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'dashboard.permissions.datatables.action') 

                ->rawColumns(['action'])
                ->make(true));
                return $data->original;
        }
        return view('dashboard.permissions.index');
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
    public function store(PermissionsRequest $request)
    {
        $permissions = parent::saveModel($request, $this->model, '');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        return view('components.permissions.update-form', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionsRequest $request)
    {
        $permission = Permission::findOrFail($request->id);
        $permission->update(['name' => $request->updateName]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
            $item = Permission::find($id);
            $item->delete();
            return true;
    }
    public function del_ids(Request $request)
    {
        $item = Permission::whereIn('id', $request->ids)->delete();
        return true;
    }
}
