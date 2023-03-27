<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequests;
use App\Http\Requests\UserRequests;
use App\Models\Address;
use App\Models\User;
use App\Notifications\UserLoginDetails;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    protected $model = User::class;
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
                    'image'=> $item->image ? asset('storage/uploads/users-images/'.$item->image) : asset('assets/media/avatars/blank.png'),
                    'email' =>$item->email,
                    'role'=> $item?->profile_image,
                    'last_login' => Carbon::parse($item?->last_login_at)->diffForHumans(), //,
                    'joined_date'=> $item->created_at->format('d-m-Y'),
                    'status' => $item?->status,
                ];
            })->toArray();
            $data =  response()->json( DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkboxes','dashboard.users.datatables.checkbox')
                ->addColumn('action', 'dashboard.users.datatables.action') 

                ->addColumn('status_user','dashboard.users.datatables.status_user')
                ->rawColumns(['action', 'checkboxes','status_user'])
                ->make(true));
                return $data->original;
        }
        $roles = Role::get();
        return view('dashboard.users.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequests $request)
    {
        $password =Str::password(10);
        $req = $request->merge(['password'=> $password]);
        $requestWithoutAddressData = new Request($req->except(['role_id', 'street', 'country_code', 'post_code', 'state','city']));
        $obj = parent::saveModel($requestWithoutAddressData, $this->model, 'uploads/users-images/');
        if($request->id != null){
          $this->updateOrCreateAddress($request);
        }else{
            $obj->notify(new UserLoginDetails($obj, $password));
        }
        $obj->syncRoles($request->role_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', compact('user'));
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
    public function update(Request $request, $id)
    {
    //     $user = User::findOrFail($request->id);
    //     $obj = parent::saveModel($request, $this->model, 'uploads/users-images/');
    //     $this->updateOrCreateAddress($request);
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

    public function updateOrCreateAddress($request)
    {
        Address::updateOrCreate(
            [
               'user_id' => $request->id,
            ],[
                'country_code' => $request->country_code,
                'state' => $request->state,
                'city' => $request->city,
                'street' => $request->street,
                'post_code' => $request->post_code,
            ], 
        );
    }
}
