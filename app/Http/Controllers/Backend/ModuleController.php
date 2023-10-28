<?php

namespace App\Http\Controllers\Backend;

use App\Models\Module;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ModuleStoreRequest;

class ModuleController extends Controller
{

    public function index()
    {
        $modules=Module::select(['id','module_name','module_slug','updated_at'])->latest()->get();
        return view('pages.module.index',compact('modules'));
    }


    public function create()
    {
        return view('pages.module.create');
    }


    public function store(ModuleStoreRequest $request)
    {
        Module::updateOrCreate([
            'module_name' => $request->module_name,
            'module_slug' => Str::slug($request->module_name),
        ]);

        Toastr::success('Module Created Successfully!');
        return redirect()->route('module.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $module=Module::find($id);
        return view('pages.module.edit',compact('module'));
    }


    public function update(ModuleStoreRequest $request, string $id)
    {
        $module = Module::find($id);
        $module->update([
            'module_name' => $request->module_name,
            'module_slug' => Str::slug($request->module_name),
        ]);

        Toastr::success('Module Updated Successfully!');
        return redirect()->route('module.index');
    }


    public function destroy(string $id)
    {
        $module = Module::find($id);
        $module->delete();

        Toastr::success('Module Deleted Successfully!');
        return redirect()->route('module.index');
    }
}
