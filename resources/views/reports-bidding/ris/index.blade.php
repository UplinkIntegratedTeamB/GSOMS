@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>Bidding Requisition and Issue Slip</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>RIS No.</th>
                    <th>PR No.</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $request->requestIssue?->c_number }}</td>
                    <td>{{ $request->pr_no }}</td>
                    <td>{{ $request->department->name }}</td>
                    <td>
                        <a href="{{ route('pdf.biddingRis', $request->requestIssue->id) }}" class="btn btn-primary">Print RIS</a>
                        <a href="{{ route('pdf.ntp', $request->id) }}" class="btn btn-success">Notice to Proceed</a>
                        @if($request->status == 12)
                        <a href="{{ route('ris-bid.edit', $request->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('ris-bid.delete', ['id' => $request->requestIssue?->id, 'rid' => $request->id]) }}"  type="button" onclick="confirmDelete(event)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        @else
                        <a href="" class="btn btn-info disabled" onclick="return false"><i class="fas fa-eye"></i></a>
                        <a href="" class="btn btn-secondary disabled" onclick="return false"><i class="fas fa-trash"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Prevent the default form submission

            const deleteURL = event.currentTarget.getAttribute('href');

            Swal.fire({
                title: 'Are you sure?'
                , text: 'You want to delete this ICS?'
                , icon: 'question'
                , showCancelButton: true
                , confirmButtonText: 'Delete'
                , cancelButtonText: 'Cancel'
            , }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteURL; // Navigate to the specified URL
                }
            });
        }

        $('#dataTable').DataTable({
            "order": [[0, "desc"]]
        });

    </script>
</div>

@endsection
