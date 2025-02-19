@extends('layouts.app')
<!-- Content -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Device Management /</span> Device List</h4>
            </div>
            <div class="mt-3">
                <!-- Button trigger modal -->
                @can('device-create')
                    <a href="{{ route('devices.create') }}" class="btn btn-primary">Create Device</a>
                @endcan
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Device List</h5>
            <div class="table-responsive text-nowrap">
                <div class="container">
                    <table class="table devices-ajax-datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Device Name</th>
                                <th>Health</th>
                                <th>Status</th>
                                <th>Manager</th>
                                <th>Assinged To</th>
                                <th>Location</th>
                                <th>Created At</th>
                                <th>Api Key</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="assignDevice" data-backdrop="static">
    </div>
@endsection
@include('devices.device-js')
