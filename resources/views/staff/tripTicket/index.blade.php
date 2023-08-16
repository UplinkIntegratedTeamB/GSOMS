@extends('layouts.app')

@section('content')

<style>
    span .selection {
        width: 100%;
    }

    .select2-container--default {
        width: 100%;
    }

    .select2-selection__rendered {
        line-height: 34px !important;
    }

    .select2-container .select2-selection--single {
        height: 39px !important;
    }

    .select2-selection__arrow {
        height: 36px !important;
        margin-right: 20px;
    }

    .inventory_item.selected_tr {
        background: gray;
        opacity: 0.5;
    }

    textarea.is-invalid {
        border-color: red !important;
    }

</style>


<div class="container-fluid card">
    <div class="card-header row">
        <div class="col">
            <h5>Trip Tickets</h5>
        </div>
    </div>
    <div class="card-body">
        <div class="card-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vehicle</th>
                        <th>Dept./Driver</th>
                        <th>As for Month of </th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trips as $trip)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $trip->item->description }}</td>
                        <td>{{ $trip->department->name }} / {{ $trip->driver }}</td>
                        <td>{{ $trip->month->name }}</td>
                        <td>{{ date('F j, Y', strtotime($trip->date)) }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('pdf.tripTicket', $trip->month->id) }}" class="btn btn-primary me-2"><i class="fas fa-file-pdf"></i></a>
                                <a href="{{ route('trip-ticket.edit', $trip->id) }}" class="btn btn-info me-2"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{ route('trip-ticket.destroy', $trip->id) }}" id="deleteForm-{{ $trip->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="button" data-trip="{{ $trip->id }}" onclick="confirmDelete(event, {{ $trip->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $('#dataTable').DataTable();

        function confirmDelete(event, userId) {
            event.preventDefault(); // Prevent the default form submission

            Swal.fire({
                title: 'Are you sure?'
                , text: 'You want to DELETE this Trip Ticket?'
                , icon: 'question'
                , showCancelButton: true
                , confirmButtonText: 'Delete'
                , cancelButtonText: 'Cancel'
            , }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`deleteForm-${userId}`).submit();
                }
            });
        }

    </script>
</div>
@endsection
