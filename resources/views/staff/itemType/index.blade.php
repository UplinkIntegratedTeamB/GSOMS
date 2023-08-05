@extends('layouts.app')

@section('content')


<div class="container-fluid card">
    <div class="card-header">
        <h5>Item Types</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped" id="dataTable">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Type</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $type->type }}</td>
                        <td>
                            <a href="{{ route('itemType.edit', $type->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('itemType.destroy', $type->id) }}" class="btn btn-danger" type="button" onclick="confirmDelete(event)"><i class="fas fa-trash" ></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
            $('#dataTable').DataTable({
                "order": [[0, "desc"]]
            });

            function confirmDelete(event) {
            event.preventDefault(); // Prevent the default form submission

            const deleteURL = event.currentTarget.getAttribute('href');

            Swal.fire({
                title: 'Are you sure?'
                , text: 'You want to delete this Item Type?'
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

    </script>
</div>

@endsection
