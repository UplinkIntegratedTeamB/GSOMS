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

    #selected_tr {
        background: gray;
        opacity: 0.5;
    }

    textarea.is-invalid {
        border-color: red !important;
    }

    #example th:nth-child(2) {
        min-width: 300px;
        /* Adjust this value to your desired width */
    }

</style>

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col pt-2 ">
                    <h4 class="fw-bold">Purchase Request</h4>
                </div>
                <div class="col" style="text-align: end;">
                </div>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('purchase-request.update', $id) }}" method="POST" id="formPr">
                @csrf
                <div class="row ">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Department</label>
                            <input type="text" class="col form-control  " id="department" name="" placeholder="Department" readonly value="{{ $requestDetail->department->name }}">
                            <input type="text" class="col form-control  " id="department" hidden name="department_id" placeholder="Department" readonly value="{{ $requestDetail->department->id }}">
                            @error('department')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Division</label>
                            <select name="division_id" id="division" class="select2 form-control">
                                @if($divisions->first() != null)
                                <option value="" disabled>Select Division</option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}" {{ old('division_id') == $division->id ? 'selected' : '' }}>
                                    {{ $division->name }}
                                </option>
                                @endforeach
                                @else
                                <option value="" disabled selected>No Division</option>
                                @endif
                            </select>

                            @error('division')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Section</label>
                            <select name="section_id" id="section" class="select2 form-control">
                            </select>
                            @error('section')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Requested By</label>
                            <input type="text" class="col form-control" id="req_by" name="requested_by" value="{{ $requestDetail->requested_by }}" readonly placeholder="Requested By">
                            @error('requested_by')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Evaluate By</label>
                            <input type="text" class="col form-control" id="eva_by" name="evaluated_by" placeholder="Evaluated By" readonly value="{{ $requestDetail->evaluated_by }}">
                            @error('evaluated_by')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div hidden class=" form-group mt-2">
                            <label for="">Procurement Mode</label>
                            <select name="" disabled id="procurement_user" class="select2 form-control" readonly>
                                <option disabled selected>Select Procurement Mode</option>
                            </select>
                            <input type="number" class="form-control" name="procurement_mode_id" id="procurement_value" value="{{ $requestDetail->procurement_mode_id }}">
                            @error('procurement_mode_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col form-group">
                                <label for="">PR No.</label>
                                <input type="text" class="form-control" id="pr_no" name="" value="{{ $requestDetail->pr_no }}" readonly>
                                @error('pr_no')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="">Date</label>
                                <input type="date" readonly class=" form-control" id="date1" name="date1" value="{{ now()->format('Y-m-d') }}">
                                @error('date1')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2 form-group">
                            <label for="">PPMP No.</label>
                            <input type="text" readonly class="col  form-control mx-2" id="ppmp_no" name="ppmp_no" placeholder="PPMP NO.">
                            @error('ppmp_no')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="row form-group mt-2" style="margin-left: 0.2px; margin-right: 0.3px">
                            <label for="purpose">Purpose <span for="" class="text-danger">*</span></label>
                            <textarea name="purpose" class="pl-3 form-control @error('purpose') is-invalid @enderror" id="purpose" rows="1" style="width: 100%;" placeholder="Purpose" required>{{ $requestDetail->purpose }}</textarea>
                            @error('purpose')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="row form-group mt-2">
                            <label for="">Region</label>
                            <input type="text" class="col  form-control mx-2" id="region" name="region" readonly value="RIVA" placeholder="Region">
                            @error('region')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div hidden class="row form-group mt-2">
                            <label for="">Source of Funds</label>
                            <input type="text" readonly class="col form-control mx-2" id="sof" name="sof" placeholder="Source of Funds">
                            @error('sof')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row form-group mt-2">
                            <label for="">End User Office <span for="" class="text-danger">*</span></label>
                            <select name="euo" id="euo" class="select2 form-control">
                                <option value="" selected disabled>Select End User Office</option>
                                @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ old('euo', $requestDetail->department->id) == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                                @endforeach
                            </select>

                            @error('euo')
                            <div class="text-danger">End User Office is required</div>
                            @enderror
                        </div>
                    </div>
                    @user
                    <div class="" style="float: right">
                        <button type="button" class="col-2 btn btn-primary mt-3 px-5" style="float: right;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</button>
                    </div>
                    @enduser
                </div>

                <div class="container-fluid p-2 mt-5 table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead class="">
                            <tr class="text-center">
                                <th>Item No.</th>
                                <th>Item Description</th>
                                <th style="width: 100px">Unit Type</th>
                                <th style="width: 150px">Quantity</th>
                                <th>Estimated Unit Cost</th>
                                <th>Estimated Cost</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center tableBody">
                            @foreach ($requestDetail->purchaseRequest as $request)
                            <tr>
                                <td><input type="text" class="form-control bg-transparent border-0" readonly value="{{ $request->item->id }}" name="items[{{ $loop->index }}][item_id]"></td>
                                <td><input type="text" class="form-control" value="{{ $request->description }}" name="items[{{ $loop->index }}][item_description]"></td>
                                <td>{{ $request->item->itemType->type }}</td>
                                <td><input type="text" name="items[{{ $loop->index }}][quantity]" value="{{ $request->quantity }}" class="form-control quantity-input"></td>
                                <td style="text-align: end">
                                    <input type="text" value="{{ $request->unit_price }}" class="form-control unit-price-input" name="items[{{ $loop->index }}][unit_price]">
                                </td>
                                <td style="text-align: end"><input type="text" value="{{ $request->estimated_cost }}" name="items[{{ $loop->index }}][estimated_cost]" readonly class="form-control estimated-cost-input"></td>
                                <td>
                                    <a href="{{ route('purchaseRequest.remove', ['id' => $request->id, 'grand' => $id ]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tbody style="">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: end">Grand Total:</td>
                                <td><input type="text" class="border-0" readonly id="grandTotal" style="outline: 0; text-align: end;" name="grand_total" value="{{ $requestDetail->grand_total }}">
                                    @error('grand_total')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group" style="float: right">
                    <button class="btn btn-primary mt-3 px-4" type="button" onclick="confirmSave(event)">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

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

    $('#division').trigger('change'); // trigger change on page load to populate sections based on default division

    $('#section').prop('disabled', true); // disable section select by default

    $('#division').on('change', function() {
        const divisionId = $(this).val();

        $('#section').empty().prop('disabled', true);
        console.log(divisionId);
        if (divisionId) {
            $.get('/divisions/' + divisionId + '/sections', function(data) {
                if (data.length) {
                    $('#section').append('<option value="" selected disabled>Select Section</option>');
                    $.each(data, function(index, section) {
                        $('#section').append('<option value="' + section.id + '">' + section.name + '</option>');
                    });
                    $('#section').prop('disabled', false);
                } else {
                    $('#section').append('<option selected disabled>No Section</option>');
                }
            })
        } else {
            $('#section').append('<option value="" selected disabled>Select Division first</option>');
        }
    });


    let selectedRows = [];
    let disabledRows = [];
    let gtotal = parseFloat({{$requestDetail->grand_total }});
    let reqId = {{ $id }}

    $(document).ready(function() {
    const tableY = $('#example').DataTable({
        drawCallback: function(settings) {
            $('.unit-price-input, .quantity-input').on('input', function() {
                calculateEstimatedCost($(this));
            });

            function calculateEstimatedCost(inputElement) {
                const row = inputElement.closest('tr');
                const quantity = parseFloat(row.find('.quantity-input').val());
                const unitPrice = parseFloat(row.find('.unit-price-input').val().replace(/[^0-9.-]/g, ''));
                const estimatedCost = (quantity * unitPrice).toFixed(2);

                row.find('.estimated-cost-input').val(estimatedCost);

                let grandTotal = 0;
                $('.estimated-cost-input').each(function() {
                    const cost = parseFloat($(this).val().replace(/[^0-9.-]/g, ''));
                    if (!isNaN(cost)) {
                        grandTotal += cost;
                    }
                });

                const procurement = $('#procurement_value');
                if (grandTotal > 200000.00) {
                    procurement.val(1); // Set procurement value to 1 if grandTotal is greater than 200000.00
                } else {
                    procurement.val(2); // Otherwise, set procurement value to 2
                }

                // Update the grand_total input field with the new value
                $('#grandTotal').val(grandTotal.toFixed(2));
            }
        }
    });
});

</script>
@endsection
