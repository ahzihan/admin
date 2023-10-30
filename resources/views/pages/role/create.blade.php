@extends('layouts.master')

@section('page-title')
    Role Create
@endsection

@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-header py-0 bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="title">Create Role</h5>
                <a href="{{ route('role.index') }}" class="btn btn-sm btn-info">Role List</a>
            </div>
            <div class="card-body">
                <form class="my-3" action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-6 col-md-3 form-label">Role Name</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="role_name"
                                class="form-control @error('role_name') is-invalid @enderror"
                                value="{{ old('role_name') }}" placeholder="Role Name..">

                            @error('role_name')
                                <span class="text-red invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-sm-6 col-md-3 form-label">Role Note</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="role_note"
                                class="form-control @error('role_note') is-invalid @enderror"
                                value="{{ old('role_note') }}" placeholder="Role Note..">

                            @error('role_note')
                                <span class="text-red invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="box-title">Manage Permission for Role</h5>
                                </div>

                                <div class="form-check my-3">
                                    <input class="form-check-input mt-3" type="checkbox" value="" id="select-all">
                                    <label class="form-check-label" for="select-all"><strong>Select All</strong>
                                    </label>
                                </div>

                                <div class="card-body">
                                    <div class="my-2">
                                        <h5>Module List:</h5>
                                         @foreach ($modules->chunk(4) as $key => $chunks)
                                            <div class="d-md-flex">
                                                @foreach ($chunks as $module)
                                                    <div class="col">
                                                        <h5 class="my-2 card-title">{{ $module->module_name }}</h5>

                                                        @foreach ($module->permissions as $permission)
                                                        <div class="form-check flex mb-3">
                                                            <input class="form-check-input mt-3" type="checkbox" value="{{ $permission->id }}" name="permissions[]"
                                                            id="permission-{{ $permission->id }}">
                                                            <label class="form-check-label" for="permission-{{ $permission->id }}">{{$permission->permission_name }}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach

                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-md btn-primary float-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $("#select-all").click(function(event){
        if(this.checked){
            $(':checkbox').each(function(){
                this.checked=true;
            })
        }else{
            $(':checkbox').each(function(){
                this.checked=false;
            })
        }
    })
</script>
@endpush
