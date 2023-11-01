@extends('layouts.master')

@section('page-title')
    403
@endsection

@section('content')
<div class="section">
	<div class="error_wrap">
    	<div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10 order-lg-first">
                	<div class="text-center">
                        <div class="error_txt">403</div>
                        <h5 class="mb-2 mb-sm-3">Unauthorized Access</h5>
                        <p>The page you are looking for was moved, removed, renamed or might never existed.</p>

                        <a href="{{ route('dashboard') }}" class="btn btn-lg btn-danger">Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
