<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\Module;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;

class RoleController extends Controller
{
    public function index()
    {
        $roles=Role::with('permissions:id,permission_name,permission_slug')->select(['id','role_name','role_slug','role_note','updated_at'])->latest()->get();

        return view('pages.role.index',compact('roles'));
    }


    public function create()
    {
        $modules=Module::with(['permissions:id,module_id,permission_name,permission_slug'])->select('id','module_name')->get();

        return view('pages.role.create',compact('modules'));
    }


    public function store(RoleStoreRequest $request)
    {

        Role::updateOrCreate([
            'role_name' => $request->role_name,
            'role_slug' => Str::slug($request->role_name),
            'role_note' => $request->role_note,
        ])->permissions()->sync($request->input('permissions', []));

        Toastr::success('Role Created Successfully!');
        return redirect()->route('role.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $role=Role::find($id);
        $modules = Module::with(['permissions:id,module_id,permission_name,permission_slug'])->select('id', 'module_name')->get();

        return view('pages.role.edit',compact('role','modules'));
    }


    public function update(RoleUpdateRequest $request, string $id)
    {
        $role = Role::find($id);
        $role->update([
            'role_name' => $request->role_name,
            'role_slug' => Str::slug($request->role_name),
            'role_note' => $request->role_note,
        ]);

        $role->permissions()->sync($request->input('permissions', []));

        Toastr::success('Role Updated Successfully!');
        return redirect()->route('role.index');
    }


    public function destroy(string $id)
    {
        $role = Role::find($id);

        if($role->is_deletable){
            $role->delete();
            Toastr::success('Role Deleted Successfully!');
            return redirect()->route('role.index');
        }else{
            Toastr::error("This role can't be deletable!");
            return redirect()->route('role.index');
        }
    }
}
