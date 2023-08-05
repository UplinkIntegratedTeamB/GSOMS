@extends('layouts.app')


@section('content')


<div class="container-fluid card">
    <div class="card-header">
        <h5>Completed Purchase Requests</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th>Purchase Request No.</th>
                        <th>Department</th>
                        <th>Division</th>
                        <th>Section</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{ $request->pr_no }}</td>
                            <td>{{ $request->department->name }}</td>
                            <td>{{ $request->division?->name }}</td>
                            <td>{{ $request->section?->name }}</td>
                            <td>{{ $request->created_at }}</td>
                            <td>
                                <a class="col btn btn-primary" href="{{ url("purchase-request/view/$request->id") }}"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('#dataTable').DataTable({
            "order": [[0, "desc"]]
        });
    </script>
</div>

@endsection
