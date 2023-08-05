@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Bac Resolution Table
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>Control No.</th>
                        <th>Resolution Title</th>
                        <th>Item Details</th>
                        <th>PR No.</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($res as $re)
                    <tr>
                        <td>{{ $re->c_number }}</td>
                        <td>{{ Str::words($re->res_title, 4, ' ...') }}</td>
                        <td>{{ Str::words($re->item_details, 4, ' ...') }}</td>
                        <td>{{ $re->requestDetail->pr_no }}</td>
                        <td>
                            <a href="{{ route('pdf.bac', $re->id) }}" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF" ><i class="fas fa-file-pdf"></i></a>
                            @if($re->requestDetail->status == 6)
                            <a href="{{ route('bac.edit', $re->id) }}" class="btn btn-primary"  data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('bac.delete', ['id' => $re->id, 'rid' => $re->requestDetail->id]) }}" type="button" onclick="confirmDelete(event)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
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
            "order": [[0, "desc"]],

            drawCallback: function (settings) {
                $(`[data-bs-toggle="tooltip"]`).tooltip({
                    container: 'body'
                })
            }
        });
    });

</script>

@endsection
