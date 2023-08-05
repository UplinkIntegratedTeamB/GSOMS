@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Abstract</h5>
        </div>
        <div class="card-body">
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
                        <td>{{ date('F j, Y', strtotime($abstract->created_at)) }}</td>
                        <td>
                            <a href="{{ route('pdf.abstract', ['id' => $abstract->requestDetail->id]) }}" class="btn btn-primary"><i class="fas fa-file-pdf"></i></a>
                            @if($abstract->requestDetail->status == 7)
                            <a href="{{ route('abstract.show', ['id' => $abstract->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            @else
                            <a href="" class="btn btn-info disabled" onclick="return false"><i class="fas fa-eye"></i></a>
                            @endif
                            @if($abstract->requestDetail->status == 8 || $abstract->requestDetail->status == 7)
                            <a href="{{ route('abstract.delete', ['id' => $abstract->id, 'rid' => $abstract->requestDetail->id]) }}" onclick="confirmDelete(event)" type="button" class="btn btn-secondary"><i class="fas fa-trash"></i></a>
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
            $('#dataTable').DataTable({
                "order": [[0, "desc"]]
            })
        });

    </script>
</div>

@endsection
