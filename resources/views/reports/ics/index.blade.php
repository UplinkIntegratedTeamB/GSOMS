@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>ICS</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>AIR No.</th>
                    <th>PR No.</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->acceptanceInspection?->c_number }}</td>
                    <td>{{ $request->pr_no }}</td>
                    <td>{{ $request->department->name }}</td>
                    <td>
                        <a href="{{ route('ics.create', $request->id) }}" class="btn btn-primary">Create ICS</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $('#dataTable').DataTable({
            "order": [[0, "desc"]]
        })
    </script>
</div>


@endsection
