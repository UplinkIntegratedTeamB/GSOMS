@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>PAR</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>PR No.</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pars as $par)
                    <tr>
                        <td>{{ $par->serial_number }}</td>
                        <td>{{ $par->requestDetail->pr_no }}</td>
                        <td>{{ $par->requestDetail->department->name }}</td>
                        <td>
                            <a href="{{ route('par.edit', $par->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('pdf.par', $par->requestDetail->id) }}" class="btn btn-primary"><i class="fas fa-file-pdf"></i></a>
                            @if($par->requestDetail->status == 11)
                                <a href="{{ route('par.delete', ['rid' => $par->requestDetail->id, 'id' => $par->id]) }}" type="button" onclick="confirmDelete(event)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            @else
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
        $('#dataTable').DataTable();
    </script>
</div>

@endsection
