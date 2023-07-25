@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>ABSTRACT OF BID</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>PR No.</th>
                        <th>Office</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abstracts as $abstract)
                    <tr>
                        <td>{{ $abstract->requestDetail->pr_no }}</td>
                        <td>{{ $abstract->requestDetail->department->name }}</td>
                        <td>{{ $abstract->created_at }}</td>
                        <td>
                            <a href="{{ route('pdf.attendance', ['id' => $abstract->id]) }}" class="btn btn-primary"><i class="fas fa-file-pdf"></i></a>
                            @if($abstract->requestDetail->status == 6)
                            <a href="{{ route('abstract.show', ['id' => $abstract->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            @else
                            <a href="" class="btn btn-info disabled" onclick="return false"><i class="fas fa-eye"></i></a>
                            @endif
                            @if($abstract->requestDetail->status == 7 || $abstract->requestDetail->status == 8)
                            <a href="{{ route('abstract-bid.delete', ['id' => $abstract->id, 'rid' => $abstract->requestDetail->id]) }}" onclick="confirmDelete(event)" type="button" class="btn btn-secondary"><i class="fas fa-trash"></i></a>
                            @else
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
            event.preventDefault(); // Prevent the default form submission

            const compute = event.currentTarget.getAttribute('href');

            Swal.fire({
                title: 'Are you sure?'
                , text: 'You want to delete this Abstract?'
                , icon: 'question'
                , showCancelButton: true
                , confirmButtonText: 'Delete'
                , cancelButtonText: 'Cancel'
            , }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = compute; // Navigate to the specified URL
                }
            });
        }

        $(document).ready(function() {
            var $dataTable = $('#dataTable');
            var hasData = $dataTable.find('tbody tr').length > 0;

            var dataTableOptions = {
                processing: true
                , columnDefs: [{
                    orderable: false
                    , targets: [0, 1, 2, 3]
                , }]
            };

            if (hasData) {
                // dataTableOptions.scrollX = true;
            }

            $dataTable.DataTable(dataTableOptions);
        });

    </script>
</div>

@endsection
