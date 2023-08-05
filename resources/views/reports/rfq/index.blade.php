@extends('layouts.app')


@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>RFQ</h5>
        </div>
        <div class="card-body ">
            <div class="table-responsive container-fluid">
                <table class="table table-striped table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <td>Quotation No.</td>
                            <td>Office</td>
                            <td>Date</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotations as $quotation)
                        <tr>
                            <td>{{ $quotation->quotation_no }}</td>
                            <td>{{ $quotation->requestDetail->department->name }}</td>
                            <td>{{ date('F j, Y', strtotime($quotation->date)) }}</td>
                            <td>
                                <a class="col btn btn-info" href="{{ route('pdf.rfq', $quotation->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF"><i class="fas fa-file-pdf"></i></a>
                                @if($quotation->requestDetail->status == 7)
                                <a class="col btn btn-primary" href="{{ route('rfq.edit', $quotation->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                <a class="col btn btn-danger" type="button" onclick="confirmDelete(event)" href="{{ route('rfq.delete', ['id' => $quotation->id, 'rid' => $quotation->requestDetail->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
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
    </div>

    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Prevent the default link behavior

            const deleteURL = event.currentTarget.getAttribute('href'); // Get the URL from the link element


            Swal.fire({
                title: 'Are you sure?'
                , text: 'You want to delete this Quotation?'
                , icon: 'question'
                , showCancelButton: true
                , confirmButtonText: 'Delete'
                , cancelButtonText: 'Cancel'
            , }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteURL; // Navigate to the specified route
                }
            });
        }

        $(document).ready(function() {
            $('#dataTable').DataTable({
                "order": [[0, "desc"]],
                drawCallback: function (settings) {
                $(`[data-bs-toggle="tooltip"]`).tooltip({
                    container: 'body'
                })
            }
            });
        });

    </script>
</div>

@endsection
