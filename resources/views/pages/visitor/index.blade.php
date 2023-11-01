@extends('layouts.master')

@section('page-title')
    Visitor List
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="title">Visitor List</h5>
                </div>
                <table id="VisitorDt" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">ID</th>
                            <th class="th-sm">IP</th>
                            <th class="th-sm">Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $d)
                            <tr>
                                <th class="th-sm">{{ $d->id }}</th>
                                <th class="th-sm">{{ $d->ip_address }}</th>
                                <th class="th-sm">{{ $d->visit_time }}</th>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="th-sm text-center">No Items Found!!!</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
