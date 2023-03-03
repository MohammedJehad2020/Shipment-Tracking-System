<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query()->orderBy('id','desc')->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' =>$item->name,
                    'role'=> $item->profile_image,
                    'last_login' => $item?->fullName,
                    'two_step'=> $item?->country?->name['en'],
                    'joined_date'=> $item->created_at->format('d-m-Y'),
                    'status' => $item->status,
                ];
            })->toArray();
            // $data = Campaign::query()->;
            $data =  response()->json( DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkboxes','dashboard.users.datatables.checkbox')
                ->addColumn('action', 'dashboard.users.datatables.action') 

                // ->addColumn('action', 'admin.admins.datatables.action') ->rawColumns(['action','status_admin'])

                // ->addColumn('status_user','dashboard.users.datatables.status_user')
                ->rawColumns(['action', 'checkboxes','status_user'])
                ->make(true));
                return $data->original;
        }
        return view('dashboard.users.index');
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
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    public function destroy( $id)
    {
            $item = User::find($id);
            $item->delete();
            return true;
    }
    public function del_ids(Request $request)
    {
        $item = User::whereIn('id', $request->ids)->delete();
        return true;
    }
}
