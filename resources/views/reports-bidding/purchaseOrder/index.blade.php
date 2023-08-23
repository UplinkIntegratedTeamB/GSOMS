@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Purchase Orders</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered" id="dataTable" style="margin-bottom: 220px">
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
                        <td class="d-flex">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle me-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fas fa-file-pdf"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li class="border border-1 p-1"><a href="{{ route('pdf.biddingPo', ['id' => $po->id]) }}" class="">Print P.O</a></li>
                                  <li class="border border-1 p-1"><a href="{{ route('pdf.noa', ['id' => $po->id]) }}" class="p-2">Print Awards</a></li>
                                  <li class="border border-1 p-1"><a href="{{ route('pdf.eligibility', ['id' => $po->id]) }}" class="p-2">Print Eligibility</a></li>
                                  <li class="border border-1 p-1"><a href="{{ route('pdf.quoted', ['id' => $po->requestDetail->id]) }}" class="p-2" >Computation of Awards</a></li>
                                  <li class="border border-1 p-1"><a href="{{ route('pdf.ntp', ['id' => $po->request_detail_id]) }}" class="p-2" >Notice to Proceed</a></li>
                                  <li class="border border-1 p-1"><a href="{{ route('pdf.pqer', $po->request_detail_id) }}" class="p-2" >Post Qualification Evalution Report</a></li>
                                  <li class="border border-1 p-1"><a href="{{ route('pdf.nopq', $po->request_detail_id) }}" class="p-2">Notice of Post Qualification</a></li>
                                </ul>
                              </div>
                            @if($po->requestDetail->status == 10)
                            <a href="{{ route('po-bid.edit', ['id' => $po->requestDetail->id]) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('po-bid.delete', ['rid' => $po->requestDetail->id, 'id' => $po->id]) }}" onclick="confirmDelete(event)" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            @else
                            <a href="" class="btn btn-info disabled me-2" onclick="return false"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-secondary disabled" onclick="return false"><i class="fas fa-trash"></i></a>
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
