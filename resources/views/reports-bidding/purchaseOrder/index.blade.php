@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Purchase Orders</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>P.O No.</th>
                        <th>PR No.</th>
                        <th>Department</th>
                        <th>Delivery Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pos as $po)
                    <tr>
                        <td>{{ $po->po_no }}</td>
                        <td>{{ $po->requestDetail->pr_no }}</td>
                        <td>{{ $po->requestDetail->department->name }}</td>
                        <td>{{ $po->delivery_date }}</td>
                        <td>
                            <a href="{{ route('pdf.biddingPo', ['id' => $po->id]) }}" class="btn btn-primary">Print P.O</a>
                            <a href="{{ route('pdf.noa', ['id' => $po->id]) }}" class="btn btn-success">Print Awards</a>
                            <a href="{{ route('pdf.eligibility', ['id' => $po->id]) }}" class="btn btn-warning">Print Eligibility</a>
                            <a href="{{ route('pdf.quoted', ['id' => $po->requestDetail->id]) }}" class="btn btn-transparent" style="background: #ADD8E6">Computation of Awards</a>
                            <a href="{{ route('pdf.ntp', ['id' => $po->request_detail_id]) }}" class="btn btn-transparent" style="background: #CBC3E3">Notice to Proceed</a>
                            <a href="{{ route('pdf.pqer', $po->request_detail_id) }}" class="btn btn-transparent" style="background: lightgray">Post Qualification Evalution Report</a>
                            <a href="{{ route('pdf.nopq', $po->request_detail_id) }}" class="btn btn-transparent border shadow">Notice of Post Qualification</a>
                            @if($po->requestDetail->status == 10)
                            <a href="{{ route('po-bid.edit', ['id' => $po->requestDetail->id]) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('po-bid.delete', ['rid' => $po->requestDetail->id, 'id' => $po->id]) }}" onclick="confirmDelete(event)" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            @else
                            <a href="" class="btn btn-secondary disabled" onclick="return false"><i class="fas fa-trash"></i></a>
                            <a href="" class="btn btn-info disabled" onclick="return false"><i class="fas fa-edit"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Prevent the default link behavior

            const deleteURL = event.currentTarget.getAttribute('href'); // Get the URL from the link element

            Swal.fire({
                title: 'Are you sure?'
                , text: 'You want to delete this Resolution?'
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

        $(document).ready(function() {
            $('#dataTable').DataTable({
                "order": [[0, "desc"]]
            });
        });

    </script>
</div>


@endsection
