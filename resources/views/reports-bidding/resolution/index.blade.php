@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>Bidding Resolution</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable">
                <thead>
                    <th>Resolution No.</th>
                    <th>PR No.</th>
                    <th>Approve Date</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($resolutions as $resolution)
                        <tr>
                            <td>{{ $resolution->c_number }}</td>
                            <td>{{ $resolution->requestDetail->pr_no }}</td>
                            <td>{{ $resolution->apprv_date }}</td>
                            <td>
                                <a href="{{ route('pdf.resolution', $resolution->id) }}" class="btn btn-primary"><i class="fas fa-file-pdf"></i></a>
                                <a href="{{ route('resolution-bid.edit', $resolution->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('resolution-bid.delete', $resolution->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('#dataTable').DataTable();
    </script>
</div>

@endsection
