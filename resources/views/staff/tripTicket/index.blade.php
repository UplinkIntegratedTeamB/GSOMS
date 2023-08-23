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
        <div class="col">
            <button class="btn btn-primary" style="float: right" data-bs-toggle="modal" data-bs-target="#exampleModal">Print</button>
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
                        <td>{{ sprintf("%04d", $trip->id) }}</td>
                        <td>{{ $trip->vehicleRegistration->description }}</td>
                        <td>{{ $trip->department->name }} / {{ $trip->driver }}</td>
                        <td>{{ $trip->month->name }}</td>
                        <td>{{ date('F j, Y', strtotime($trip->date)) }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('pdf.driver', $trip->id) }}" class="btn btn-primary me-2"><i class="fas fa-file-pdf"></i></a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Month</label> <br>
                        <select name="" id="monthSelect" class="form-select select2" style="width: 100%">
                            <option value="" selected disabled>Select Month</option>
                            @foreach ($months as $month)
                                <option value="{{ $month->id }}">{{ $month->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Gas Station</label>
                        <select name="" id="gasStationSelect" class="select2 form-select" style="width: 100%">
                            <option value="" disabled selected>Select Gas Station</option>
                            @foreach ($gases as $gas)
                                <option value="{{ $gas->id }}">{{ $gas->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="" class="btn btn-primary" id="saveButton" >Save</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#dataTable').DataTable();

        $(document).ready(function () {
        $('#saveButton').on('click', function (event) {
            const selectedMonthValue = $('#monthSelect').val();
            const selectedGasStationValue = $('#gasStationSelect').val();

            // Generate the route using the selected values
            const route = "{{ route('pdf.tripTicket', ['id' => ':month', 'gas' => ':gas']) }}";
            const updatedRoute = route
                .replace(':month', selectedMonthValue)
                .replace(':gas', selectedGasStationValue);

            // Update the href attribute of the button
            $(this).attr('href', updatedRoute);
        });
    });

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
