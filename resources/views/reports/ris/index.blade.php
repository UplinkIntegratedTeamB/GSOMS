@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>Requisition and Issue Slip</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>PR No.</th>
                    <th>AIR No.</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $request->pr_no }}</td>
                        <td>{{ $request->acceptanceInspection->c_number }}</td>
                        <td>{{ $request->department->name }}</td>
                        <td>
                            <a href="{{ route('ris.create', $request->id) }}" class="btn btn-primary">Create RIS</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $('#dataTable').DataTable({
            "order": [[0, "desc"]]
        });
    </script>
</div>

@endsection
