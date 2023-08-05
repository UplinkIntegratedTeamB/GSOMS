@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>Supplier</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped datatable ">
                <thead>
                    <tr>
                        <td>Control No.</td>
                        <td>Name</td>
                        <td>Date Submitted</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->control_no }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->created_at }}</td>
                        <td>
                            <a href="{{ url("/suppliers/edit/$supplier->id") }}" class="btn btn-primary text-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('suppliers.delete', $supplier->id) }}" onclick="confirmDelete(event)" class="btn btn-danger text-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
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
        event.preventDefault(); // Prevent the default form submission

        const deleteURL = event.currentTarget.getAttribute('href');

        Swal.fire({
            title: 'Are you sure?'
            , text: 'You want to delete this Supplier?'
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
        $('.datatable').DataTable({
            "order": [[0, "desc"]],
            drawCallback: function (settings) {
                $(`[data-bs-toggle="tooltip"]`).tooltip({
                    container: 'body'
                })
            }
        })

    })

</script>

@endsection
