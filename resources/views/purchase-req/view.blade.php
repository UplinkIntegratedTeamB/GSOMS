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

    .disable-row {
        pointer-events: none;
    }

</style>

<div class="container-fluid">

    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col pt-2 ">
                    <h4 class="fw-bold">Purchase Request Preview</h4>
                </div>
                <div class="col" style="text-align: end;">
                    {{-- <button class="btn btn-primary">Add Items</button> --}}
                </div>
            </div>
        </div>
        <div class="card-body">

            {{-- {{ $dataTable->table() }} --}}
            <form action="{{ route('purchase-request.update', ['id' => $request_detail->id]) }}" method="POST">
                @csrf
                <div class="row ">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Department</label>
                            <input type="text" class="col form-control  " id="department" name="department" placeholder="Department" readonly value="{{ $request_detail->department->name }}">
                            <input type="text" class="col form-control  " id="department" name="department_id" placeholder="Department" hidden value="{{ $request_detail->department->id }}">
                            @error('department')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Division</label>
                            <select disabled name="division" id="division" class="select2 form-control">
                                @if($request_detail->user->department->divisions->first())
                                <option value="" selected disabled>Select Division</option>
                                <option value="{{ $request_detail->division_id }}" {{ old('division_id', $request_detail?->division_id) == $request_detail?->division_id ? 'selected' : '' }} >{{ $request_detail->division?->name }}</option>
                                @else
                                <option value="">No Division</option>
                                @endif
                            </select>
                            @error('division')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Section</label>
                            <select disabled name="section" id="section" class="select2 form-control">
                                <option value="{{ $request_detail?->section_id }}" {{ old('division_id', $request_detail?->section_id) == $request_detail?->section_id ? 'selected' : '' }} >{{ $request_detail->section?->name }}</option>
                            </select>
                            @error('section')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Requested By</label>
                            <input type="text" class="col  form-control" id="req_by" name="requested_by" readonly placeholder="Requested By" value="{{ $request_detail->requested_by }}">
                            @error('requested_by')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="">Evaluated By</label>
                            <input type="text" class="col  form-control" id="eva_by" name="evaluated_by" placeholder="Evaluated By" readonly value="{{ $request_detail->evaluated_by }}">
                            @error('eva_by')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col mt-2">
                            @staff
                            <div class="form-group">
                                <label for="">Procurement Mode</label>
                                <select disabled name="procurement_mode_id" id="procurement" class="select2 form-control">
                                    <option selected disabled>Select an Option</option>
                                    @foreach ($procurementModes as $procurementMode)
                                    <option value="{{ $procurementMode->id }}" {{ old('procurement_mode_id', $request_detail->procurement_mode_id) == $procurementMode->id ? 'selected' : '' }}>
                                        {{ $procurementMode->name }}</option>
                                    @endforeach
                                </select>
                                @error('procurement_mode_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @endstaff
                            @user
                            <div class="form-group">
                                <label for="">Procurement Mode</label>
                                <select name="procurement_mode_id" disabled id="procurement" class="select2 form-control">
                                    <option selected disabled>Select an Option</option>
                                    @foreach ($procurementModes as $procurementMode)
                                    <option value="{{ $procurementMode->id }}" {{ old('procurement_mode_id', $request_detail->procurement_mode_id) == $procurementMode->id ? 'selected' : '' }}>
                                        {{ $procurementMode->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @enduser
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col form-group">
                                <label for="">PR No.</label>
                                <input type="text" class="form-control" id="pr_no" name="pr_no" readonly value="{{ $request_detail->pr_no }}">
                                @error('pr_no')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <label for="">Date</label>
                                <input type="date" readonly class=" form-control" id="date1" name="date1" value="{{ $request_detail->date1 }}">
                                @error('date1')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                            <div  class="row form-group mt-2">
                                <label for="">PPMP No.</label>
                                <input type="number" class="col form-control mx-2" readonly id="ppmp_no" name="ppmp_no" placeholder="PPMP NO." value="{{ $request_detail->ppmp_no }}">
                            </div>

                        <div class="row form-group mt-2" style=" margin-left: 0.2px; margin-right: 0.3px">
                            <label for="">Purpose</label>
                            <textarea class=" pl-3 form-control" disabled name="purpose" id="purpose" rows="1" style="width: 100%;" placeholder="Purpose">{{ $request_detail->purpose }}</textarea>
                            @error('purpose')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                            <div class="row form-group mt-2">
                                <label for="">Region</label>
                                <input type="text" class="col form-control mx-2" id="region" name="region" readonly placeholder="Region" value="{{ $request_detail->region }}">
                                @error('region')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        <div class="row form-group mt-2">
                            <label for="">Source of Funds</label>
                            <input type="text" readonly class="col form-control mx-2" id="sof" name="sof" placeholder="Source of Funds" value="{{ $request_detail->sof }}">
                            @error('sof')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row form-group mt-2">
                            <label for="">End User Office</label>
                            <select disabled name="euo" id="euo" class="select2 form-control">
                                <option value="" selected disabled>Select End User Office</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('euo', $request_detail->euo) == $department->id ? 'selected' : ''  }} >{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('euo')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                </div>

                <div class="container p-2 mt-5">
                    <table id="example" class="table table-bordered">
                        <thead class="">
                            <tr class="text-center">
                                <th>Item No.</th>
                                <th>Item Description</th>
                                <th>Unit Type</th>
                                <th>Quantity</th>
                                <th>Estimated Unit Cost</th>
                                <th>Estimated Cost</th>
                            </tr>
                        </thead>
                        <tbody class=" tableBody">
                            @php
                            $totalEstimatedCost = 0;
                            @endphp
                            @foreach ($request_detail->purchaseRequest as $purchaseRequest)
                            <tr class="text-center">
                                <td><input type="text" class="border-0 bg-transparent form-control" name='items[{{ $loop->index }}][item_id]' id="item_id" readonly value="{{ $purchaseRequest->item_id }}"></td>
                                <td><input type="text" class="border-0 bg-transparent form-control" name="" readonly value="{{ $purchaseRequest->item->description }}"></td>
                                <td><input type="text" class="border-0 bg-transparent form-control" name="" readonly value="{{ $purchaseRequest->item->itemType->type }}"></td>
                                <td><input type="number" class="border-0 bg-transparent form-control quantity-input" readonly data-unit-price="{{ $purchaseRequest->item->unit_price }}" name='items[{{ $loop->index }}][quantity]' value="{{ $purchaseRequest->quantity }}"></td>
                                {{ $unit_price = $purchaseRequest->item->unit_price }}
                                <td><input type="text" class="border-0 bg-transparent form-control" name="" readonly value="{{ number_format($unit_price, 2) }}"></td>
                                <td><input type="text" class="border-0 bg-transparent form-control estimated-cost-input" name="items[{{ $loop->index }}][estimated_cost]" readonly value="{{ number_format($purchaseRequest->estimated_cost, 2) }}"></td>
                            </tr>
                            @php
                            $totalEstimatedCost += $purchaseRequest->estimated_cost;
                            @endphp
                            @endforeach
                            <tr class="text-center">
                                <td>
                                    <label class="mt-2">Grand Total:</label>
                                </td>
                                <td>
                                    <input type="text" readonly id="grandTotal" name="grand_total" class="form-control border-0 bg-transparent fw-bold text-danger" value="{{ number_format($totalEstimatedCost, 2) }}">
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped" id="dataTables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item No</th>
                            <th>Item Description</th>
                            <th>Unit Type</th>
                            <th>Unit Price</th>
                            <th>Inflation Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventories as $inventory)
                        <tr class="text-center inventory_item" data-id="{{ $inventory->id }}">
                            <td><input type="checkbox" class="clickable"></td>
                            <td>{{ $inventory->id }}</td>
                            <td>{{ $inventory->description }}</td>
                            <td>{{ $inventory->itemType->type }}</td>
                            <td>{{ $inventory->unit_price }}</td>
                            <td>0</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>


<script>

$('#division').trigger('change'); // trigger change on page load to populate sections based on default division

$('#section').prop('disabled', true); // disable section select by default

$('#division').on('change', function() {
    const divisionId = $(this).val();

    $('#section').empty().prop('disabled', true);

    if (divisionId) {
        $.get('/divisions/' + divisionId + '/sections', function(data) {
            if (data.length) {
                $('#section').append('<option value="" selected disabled>Select Section</option>');
                $.each(data, function(index, section) {
                    $('#section').append('<option value="' + section.id + '">' + section.name + '</option>');
                });
                $('#section').prop('disabled', false); // enable section select if division has sections
            } else {
                $('#section').append('<option selected disabled>No Section</option>');
            }
        })
    } else {
        $('#section').append('<option value="" selected disabled>Select Division first</option>');
    }
});

    $(document).ready(function() {
        const baseUrl = '{{ url('') }}';
        $('#example').DataTable({
            // processing: true,
            scrollX: true
        , });
        $('#dataTables').DataTable();
    })

</script>
@endsection
