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
    <div class="card-header">
        <h5>Trip Ticket</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('trip-ticket.update', $tripTicket->id) }}" method="POST" id="formPr">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">As for Month of</label>
                <select name="month_id" id="" class="form-select select2">
                    @foreach ($months as $month)
                        <option value="{{ $month->id }}" @selected($tripTicket->month_id == $month->id)>{{ $month->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <label for="">Department</label>
                        <select name="department_id" id="department" class="form-select select2">
                            <option value="" selected disabled>Select Department</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}" @selected($tripTicket->department_id == $department->id)>{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('department_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Division</label>
                        <select name="division_id" id="division" class="select2 form-control"></select>
                        @error('division')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Supplier</label>
                        <select name="supplier_id" id="" class="form-select select2">
                            <option value="" selected disabled>Select Supplier</option>
                            @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ $tripTicket->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('supplier_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Place to be visited</label>
                        <input type="text" name="place_to_visit" placeholder="Place to be visited" class="form-control" value="{{ $tripTicket->place_to_visit }}">
                    </div>
                    @error('place_to_visit')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="">Date</label>
                        <input type="date" name="date" class="form-control" value="{{ $tripTicket->date }}">
                    </div>
                    @error('date')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="">Others Amount</label>
                        <input type="number" name="amount" placeholder="Others Amount" class="form-control" value="{{ $tripTicket->amount }}">
                    </div>
                    @error('amount')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="">Vehicle</label>
                        <select name="item_id" id="" class="form-select select2">
                            <option value="" selected disabled>Select Vehicle</option>
                            @foreach ($items as $item)
                            <option value="{{ $item->id }}" {{ $tripTicket->item_id == $item->id ? 'selected' : '' }}>{{ $item->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('item_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Driver</label>
                        <input type="text" name="driver" placeholder="Driver" class="form-control" value="{{ $tripTicket->driver }}">
                    </div>
                    @error('driver')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="row">
                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="">Pasenger</label>
                                <input type="text" name="passenger" placeholder="Passenger" class="form-control" value="{{ $tripTicket->passenger }}">
                            </div>
                            @error('passenger')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col form-group mt-2">
                            <label for="">Gas Type</label>
                            <select name="gas_type" id="" class="select2 form-select">
                                <option value="" selected disabled>Select Gas Type</option>
                                <option value="1" {{ $tripTicket->gas_type == 1 ? 'selected' : '' }}>Regular</option>
                                <option value="2" {{ $tripTicket->gas_type == 2 ? 'selected' : '' }}>Unleaded</option>
                                <option value="3" {{ $tripTicket->gas_type == 3 ? 'selected' : '' }}>Diesel</option>
                            </select>
                        </div>
                        @error('gas_type')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Purpose</label>
                        <textarea name="purpose" class="form-control" rows="1" placeholder="Purpose">{{ $tripTicket->purpose }}</textarea>
                    </div>
                    @error('purspose')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="row">
                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="">From</label>
                                <input name="start_time" class="form-control" type="time" value="{{ $tripTicket->start_time }}" />
                            </div>
                            @error('purspose')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="">To</label>
                                <input name="end_time" class="form-control" type="time" value="{{ $tripTicket->end_time }}" />
                            </div>
                            @error('purspose')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="">Oil Issued</label>
                        <input type="number" name="oil_issued" class="form-control" placeholder="Oil Issued" value="{{ $tripTicket->oil_issued }}">
                    </div>
                    @error('oil_issued')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" onclick="confirmSave(event)" style="float: right">Save</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(() => {
            $('#department').trigger('change'); // trigger change on page load to populate sections based on default division


            $('#department').on('change', function() {
                const divisionId = $(this).val();
                const baseUrl = '{{ url('
                ') }}';

                if (divisionId) {
                    $.get(baseUrl + '/departments/' + divisionId + '/divisions', function(data) {
                        if (data.length) {
                            $('#division').append('<option value="" selected disabled>Select Division</option>');
                            $.each(data, function(index, division) {
                                $('#division').append('<option value="' + division.id + '">' + division.name + '</option>');
                            });
                        } else {
                            $('#division').append('<option selected disabled>No Division</option>');
                        }
                    })
                } else {
                    $('#division').append('<option value="" selected disabled>This Department doesnt have a division</option>');
                }
            });
        })

    </script>
    <script>
        function confirmSave(event) {
            event.preventDefault(); // Prevent the default form submission

            Swal.fire({
                title: 'Are you sure?'
                , text: 'You are about to save the form.'
                , icon: 'question'
                , showCancelButton: true
                , confirmButtonText: 'Save'
                , cancelButtonText: 'Cancel'
            , }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formPr').submit(); // Submit the form
                }
            });
        }
    </script>
</div>

@endsection
