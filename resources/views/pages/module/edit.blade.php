@extends('layouts.master')

@section('page-title')
    Module Edit
@endsection

@section('content')
<div class="container my-5">
        <div class="card">
            <div class="card-header py-0 bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="title">Update Module</h5>
                <a href="{{ route('module.index') }}" class="btn btn-sm btn-info">Module List</a>
            </div>
            <div class="card-body">
                <form class="my-3" action="{{ route('module.update', $module->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <label class="col-sm-6 col-md-3 form-label">Module Name</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="module_name"
                                class="form-control @error('module_name') is-invalid @enderror"
                                value="{{ $module->module_name }}">

                            @error('module_name')
                                <span class="text-red invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-md btn-primary float-right">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
