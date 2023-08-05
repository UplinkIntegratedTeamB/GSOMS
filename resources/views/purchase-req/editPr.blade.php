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
    min-width: 300px; /* Adjust this value to your desired width */
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
                            <input type="number" hidden class="form-control" name="procurement_mode_id" id="procurement_value">
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

                    <div class="" style="float: right">
                        <button type="button" class="col-2 btn btn-primary mt-3 px-5" style="float: right;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</button>
                    </div>

                </div>

                <div class="container-fluid p-2 mt-5 table-responsive">
                    <div class="table-responsive">
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
                                    <td><input type="text" class="form-control" value="{{ $request->description }}" name="items[{{ $loop->index }}][description]"></td>
                                    <td>{{ $request->item->itemType->type }}</td>
                                    <td><input type="text" value="{{ $request->quantity }}" name="items[{{ $loop->index }}][quantity]" class="form-control quantity-input"></td>
                                    <td style="text-align: end"><input type="text" value="{{ number_format($request->unit_price, 2) }}" readonly name="items[{{ $loop->index }}][unit_price]" class="form-control border-0 bg-transparent unit-price-input"></td>
                                    <td style="text-align: end"><input type="text" name="items[{{ $loop->index }}][estimated_cost]" value="{{ number_format($request->estimated_cost, 2) }}" class="form-control estimated-cost-input"></td>
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
                                    <td><input type="text" class="border-0" readonly id="grandTotal" style="outline: 0; text-align: end;" name="grand_total" value="{{ number_format($requestDetail->grand_total, 2) }}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group" style="float: right">
                    <button class="btn btn-primary mt-3 px-4" type="button" onclick="confirmSave(event)">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="">
            <div class="modal-header">
                <h1 class="modal-title- fs-5" id="staticBackdropLabel">Inventory List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <div class="container-fluid" id="inventoryTable">
                    <table id="category-table" class="data-table table table-bordered table-responsive" style="width: 100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>
                                    <select name="category" id="category_id" class="filter select2 form-control">
                                        <option value="" selected>Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th></th>
                                <th>
                                    @foreach ($requestDetail->purchaseRequest as $request->first)
                                    <input type="text" hidden class="form-control " value="{{ $request->item->itemType->type }}" id="unit">
                                    @endforeach
                                </th>
                                <th></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Item No.</th>
                                <th>Category</th>
                                <th>Item Description</th>
                                <th>Unit Type</th>
                                <th>Unit</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Done</button>
            </div>
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
    let gtotal = parseFloat({{ $requestDetail->grand_total }});
    let reqId = {{ $id }}
    $.ajax({
        url: '/purchase-request/json/' + reqId, // Replace with your actual controller URL and ID
        type: 'GET'
        , dataType: 'json'
        , success: function(response) {
            // Assuming the response contains a "data" property with an array of objects
            if (response.hasOwnProperty('data')) {
                disabledRows = response.data.map(item => item.item_id);
                console.log('disabledRows:', disabledRows);
            }
        }
        , error: function(xhr, status, error) {
            console.error(error);
        }
    });

    $(document).ready(function() {

        $('#example').on('input', '.quantity-input', function() {
        calculateEstimatedCost($(this));
        });

        function calculateEstimatedCost(quantityInput) {
            const row = quantityInput.closest('tr');
            const quantity = parseFloat(row.find('.quantity-input').val());
            const unitPriceInput = row.find('.unit-price-input');  // Added this line
            const unitPrice = parseFloat(unitPriceInput.val().replace(/[^0-9.-]/g, ''));
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
                procurement.val(1);
            } else {
                procurement.val(2);
            }

            // Update the grand_total input field with the new value
            $('#grandTotal').val(grandTotal.toFixed(2));
        }

        const tableX = $('#example').DataTable();


        const tableY = $('.data-table').DataTable({
            processing: true
            , serverSide: true
            , deferRender: false
            , columnDefs: [{
                orderable: false
                , targets: [0, 1, 2, 3, 4, 5]
            , }],


            drawCallback: function(settings) {
                applySelectedRowClass();
                applySelectRowDisable();

                $('.inventory_item').click(function(e) {
                    const checkbox = $(this).find('.clickable');
                    const baseUrl = '{{ url('') }}';
                    const rowDataId = $(this).data('id');
                    $(this).toggleClass('selected_tr');
                    checkbox.prop('checked', !checkbox.prop('checked'));
                    const row = $(this);

                    if (!row.hasClass('selected_tr')) {
                        // Remove the row from the table
                        $('#example tbody tr.appended-row[data-id="' + rowDataId + '"]').remove();
                        $(this).removeClass('selected_row');
                        // console.log('removed ' + rowDataId);

                        const index = selectedRows.indexOf(rowDataId);
                        if (index !== -1) {
                            selectedRows.splice(index, 1);
                        }
                        console.log(selectedRows);
                    } else {
                        $.ajax({
                            url: baseUrl + '/item/' + rowDataId
                            , success: function(response) {

                                if (!selectedRows.includes(rowDataId)) {
                                    selectedRows.push(rowDataId);
                                }

                                function updateTotalPrice() {
                                    let quantityInput = $(this);
                                    let quantity = quantityInput.val();
                                    console.log(quantityInput);
                                    let unitPrice = response.unit_price;
                                    let totalCost = (quantity * unitPrice).toFixed(2);
                                    console.log(unitPrice);
                                    quantityInput.closest('tr.appended-row').find(`input[name="items[${tableLength}][estimated_cost]"]`).val(totalCost);
                                    updateGrandTotal();
                                }

                                function updateGrandTotal() {
                                    let totalCost = gtotal;
                                    $('#example tbody tr.appended-row').each(function() {
                                        let estimatedCost = parseFloat($(this).find('input[name*=estimated_cost]').val()) || 0;
                                        totalCost += estimatedCost;
                                    });
                                    $('#grandTotal').val(totalCost.toFixed(2));

                                    const grandTotalVal = parseFloat($('#grandTotal').val());
                                    const procurement = $('#procurement_value');
                                    if (grandTotalVal > 200000.00) {
                                        procurement.val(1); // Set procurement value to 1 if grandTotal is greater than 200000.00
                                    } else {
                                        procurement.val(2); // Otherwise, set procurement value to 2
                                    }
                                }

                                const tableLength = $('#example tbody tr.appended-row').length;

                                function toggleSubmitButton() {
                                    const rowCount = $('.appended-row').length;
                                    const submitButton = $('.btn.btn-primary');
                                    if (rowCount > 0) {
                                        submitButton.prop('disabled', false);
                                    } else {
                                        submitButton.prop('disabled', true);
                                    }
                                }

                                $(document).on('input', 'input[name*=quantity]', updateTotalPrice);

                                const newRowHtml = `
                            <tr class="appended-row" data-id="${response.id}">
                                <td><input class='form-control bg-transparent border-0' readonly value='${response.id}' name='items[${tableLength}][item_id]' /></td>
                                <td><input class="form-control" value="${response.description}" name="items[${tableLength}][description]" /></td>
                                <td><label>${response.unit.description}</label></td>
                                <td><input class='form-control bg-transparent' type='number' id='qty' value="{{ old('quantity') }}" required placeholder="Quantity" name='items[${tableLength}][quantity]' /></td>
                                <td><input class='form-control bg-transparent border-0' value='${response.unit_price}' readonly id='unit_price' style="text-align: end" name='items[${tableLength}][unit_price]' readonly /></td>
                                <td><input class='form-control bg-transparent border-0' id="estimatedCost" readonly value='' readonly style="text-align: end" name='items[${tableLength}][estimated_cost]' /></td>
                            </tr>`;

                                // Append the new row at the top of the table
                                $('.tableBody').prepend(newRowHtml);
                                $('#example tbody').on('input', 'input[name*=quantity]', updateTotalPrice);
                                updateGrandTotal();
                                toggleSubmitButton();
                                console.log(selectedRows);

                                $('input[name*=quantity]').val($('input[name*=quantity]').val().replace(/[^0-9]/g, ''));
                            }
                        });
                    }
                });
            }
            , ajax: {
                url: "{{ route('inventory.index') }}"
                , data: function(d) {
                    d.category_id = $('#category_id').val()
                        , d.search = $('input[aria-controls="DataTables_Table_0"]:first').val()
                        , d.unit = $('#unit').val();
                }
            }
            , columns: [{
                    data: 'checkbox'
                    , name: 'checkbox'
                    , visible: false
                }
                , {
                    data: 'id'
                    , name: 'id'
                }
                , {
                    data: 'category_id'
                    , name: 'category_id'
                }
                , {
                    data: 'description'
                    , name: 'description'
                }
                , {
                    data: 'item_type_id'
                    , name: 'item_type_id'
                    , render: function(data, type, row) {
                        // Limit description to 5 words
                        var words = data.split(' ').slice(0, 3).join(' ');
                        return words + (data.split(' ').length > 3 ? '...' : '');
                    }
                }
                , {
                    data: 'unit_id'
                    , name: 'unit_id'
                }
            , ]
        });
        $('#category_id').change(function() {
            console.log('d.category_id');
            tableY.draw();
        });

        function applySelectedRowClass() {
            selectedRows.forEach(function(value) {
                const selectedElement = $(`.inventory_item[data-id="${value}"]`);
                if (!selectedElement.hasClass('selected_tr')) {
                    selectedElement.addClass('selected_tr');
                }
            })
        }

        function applySelectRowDisable() {
            disabledRows.forEach(function(value) {
                const selectedElement = $(`.inventory_item[data-id="${value}"]`);
                selectedElement.removeClass('inventory_item')
                selectedElement.attr('id', 'selected_tr')
            })
        }
        $('.select2-container--default').removeAttr("style");
    });

</script>
@endsection
