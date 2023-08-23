@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>Registered Vehicles</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>
                            <select name="" id="type" class="select2 form-select">
                                <option value="" selected>Type</option>
                                <option value="0">4 Wheeled Plus</option>
                                <option value="1">Motor</option>
                            </select>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Plate Number</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Next Renewal for LTO</th>
                        <th>Next Renewal for GSIS</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->plate_no }}</td>
                            <td>
                                @if($vehicle->type == 0)
                                    4 Wheeled Plus
                                    @else
                                    Motor
                                @endif
                            </td>
                            <td>{{ $vehicle->description }}</td>
                            <td>{{ date('F, j', strtotime($vehicle->lto) ) }} {{ date('F, j, Y', strtotime($vehicle->lto_until)) }} </td>
                            <td>{{ $vehicle->gsis }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('vehicle.edit', $vehicle->id) }}" class="btn btn-primary me-2"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{ route('vehicle.destroy', $vehicle->id) }}" id="deleteForm-{{ $vehicle->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="button" onclick="confirmDelete(event, {{ $vehicle->id }})">
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
                title: 'Are you sure?',
                text: 'You want to delete this Vehicle?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`deleteForm-${userId}`).submit();
                }
            });
        }

        // $(function() {
        //     const table = $('#dataTable').DataTable({
        //         "order": [[0, "desc"]]
        //         , ajax: {
        //             url: "{{ route('vehicle.index') }}"
        //             , data: function(d) {
        //                 d.type = $('#type').val(),
        //                 d.search = $('input[type="search"]').val()
        //             }
        //         }
        //         , columns: [{
        //                 data: 'plate_no'
        //                 , name: 'plate_no'
        //             }
        //             , {
        //                 data: 'type'
        //                 , name: 'type'
        //             }
        //             , {
        //                 data: 'description'
        //                 , name: 'description'
        //             }
        //             , {
        //                 data: 'lto'
        //                 , name: 'lto'
        //             }
        //             , {
        //                 data: 'gsis'
        //                 , name: 'gsis'
        //             }
        //             , {
        //                 data: 'edit'
        //                 , name: 'edit'
        //             }
        //         , ]
        //     , });

        //     $('#type').change(function() {
        //         table.draw();
        //     });
        // });

    </script>
</div>

@endsection
