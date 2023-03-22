<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use App\Models\Menu;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{

    protected $model = Role::class;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        // $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menus = Menu::get();
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('dashboard.roles.index', compact('roles', 'menus'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request)
    {
        $role = parent::saveModel($request, $this->model, '');
        $role->syncPermissions($request->input('permissions'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::with(['permissions', 'users'])->findOrFail($id);
        $rolePermessionsIds = $role->permissions->pluck('id')->toArray();
        $menus = Menu::with(['permissions'])->get();
        return view('dashboard.roles.show', compact('role', 'menus','rolePermessionsIds'));
    
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $rolePermessionsIds = $role->permissions->pluck('id')->toArray();
        $menus = Menu::with(['permissions'])->get();
        return view('components.roles.update-role', compact('role', 'menus','rolePermessionsIds'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /*  public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    } */


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



    public function roleUsers(Request $request, $id)
    {
        // dd($request->all(), $id);
        $role = Role::findOrFail($request->id);
        $users_ids = $role->users->pluck('id')->toArray();

        if ($request->ajax()) {
            $data = User::query()->whereIn('id', $users_ids)->orderBy('id','desc')->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' =>$item->name,
                    'image'=> $item->image ? asset('storage/uploads/users-images/'.$item->image) : asset('assets/media/avatars/blank.png'),
                    'email' =>$item->email,
                    'joined_date'=> $item->created_at->format('d-m-Y'),
                ];
            })->toArray();
            $data =  response()->json( DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkboxes','dashboard.roles.datatables.checkbox')
                ->addColumn('action', 'dashboard.roles.datatables.action') 

                // ->addColumn('status_user','dashboard.roles.datatables.status_user')
                ->rawColumns(['action', 'checkboxes'/* ,'status_user' */])
                ->make(true));
                return $data->original;
        }
        // return view('dashboard.roles.show');
    }
}
