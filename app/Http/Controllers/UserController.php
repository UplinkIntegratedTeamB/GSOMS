<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with(['roles', 'department'])->orderBy('created_at', 'desc')->paginate();

        if($request->ajax()) {
            $data = $users;
            return DataTables::of($data)
            ->addIndexColumn()
            ->filter(function($instance) use ($request) {
                if($request->get('role_id') == 1 || $request->get('role_id') == 2 || $request->get('role_id') == 3 || $request->get('role_id') == 4 ) {
                    $instance->where('role_id', $request->get('role_id'));
                }
                if(!empty($request->get('search'))) {
                    $instance->where(function($w) use ($request) {
                        $search = $request->get('search');
                    });
                }
            });
        }

        return view('admin.account.index', compact('users'));
    }

    public function create() {
        $departments = Department::paginate();

        return view('admin.account.create', compact('departments'));
    }

    public function store(StoreUserRequest $request) {

        $user = User::create([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', $request->role_id)->firstOrFail();

        $user->assignRole($role);

        return redirect()->route('users.index');
    }

    public function edit($id) {
        $departments = Department::paginate();

        $users = User::with('department', 'roles')->find($id);

        $roles = Role::paginate();

        return view('admin.account.edit', compact('departments', 'users', 'roles', 'id'));
    }

    public function update(Request $request, $id) {

        $user = User::find($id);

        $user->update([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $roles = Role::whereIn('name', [$request->role_id])->pluck('id');
        $user->syncRoles($roles);

        return redirect()->route('users.index');
    }

    public function delete($id) {
        $user = User::find($id);

        $user->delete();
        return redirect()->route('users.index');
    }

}
