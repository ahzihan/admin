<?php

namespace App\Http\Controllers\Backend;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\PermissionStoreRequest;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions=Permission::with(['module:id,module_name'])->select(['id','module_id','permission_name','permission_slug','updated_at'])->latest()->get();

        return view('pages.permission.index',compact('permissions'));
    }


    public function create()
    {
        $modules = Module::select(['id', 'module_name'])->latest()->get();

        return view('pages.permission.create',compact('modules'));
    }


    public function store(PermissionStoreRequest $request)
    {
        Permission::updateOrCreate([
            'module_id' => $request->module_id,
            'permission_name' => $request->permission_name,
            'permission_slug' => Str::slug($request->permission_name),
        ]);

        Toastr::success('permission Created Successfully!');
        return redirect()->route('permission.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $modules = Module::select(['id', 'module_name'])->latest()->get();

        $permission=Permission::find($id);
        return view('pages.permission.edit',compact('permission','modules'));
    }


    public function update(PermissionStoreRequest $request, string $id)
    {
        $permission = Permission::find($id);
        $permission->update([
            'module_id' => $request->module_id,
            'permission_name' => $request->permission_name,
            'permission_slug' => Str::slug($request->permission_name),
        ]);

        Toastr::success('Permission Updated Successfully!');
        return redirect()->route('permission.index');
    }


    public function destroy(string $id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        Toastr::success('Permission Deleted Successfully!');
        return redirect()->route('permission.index');
    }
}
