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

</style>

<div class="container-fluid ">
    <div class="card py-5">
        <div class="card-header">
            <h5>Abstract Shopping/Canvass</h5>
        </div>
        <form action="{{ route('abstract.store',  $id) }}" method="POST">
            @csrf
            <div class="card-body row">
                <div class="col">
                    <div class="form-group">
                        <label for="">PR No.</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" value="{{ $requests->pr_no }}">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">PR Date</label>
                        <div class="input-group">
                            <input type="text" class="form-control" readonly value="{{ date('F j, Y', strtotime($requests->created_at)) }}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Department/Office</label>
                        <div class="input-group">
                            <input type="text" class="form-control" readonly value="{{ $requests->department->name }}">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Current Date</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" value="{{ date('F j, Y', strtotime(now())) }}">
                        </div>
                    </div>
                </div>
                <input type="text" name="winner" id="winner" hidden>
            </div>

            <table class="table table-bordered mt-3" id="dataTable">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Item No</td>
                        <td>Item Description</td>
                        <td>Quantity</td>
                        <td>Unit Price</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests->purchaseRequest as $request)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $request->item->id }}</td>
                        <td>{{ Str::words($request->item->description, 5, ' ...') }}</td>
                        <td>{{ $request->quantity }}</td>
                        <td>{{ $request->unit_price }}</td>
                        <td>{{ $request->estimated_cost }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="button" class="btn btn-primary m-4" style="float: right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Supplier
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-4">
                                <label for="">Supplier</label> <br>
                                <select name="supplier_id" id="supplier_${supplierLength}" class="form-control select2" style="width: 100%" required>
                                    <option value="" selected disabled>Select Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <table class="table table-bordered" id="modalTable">
                                <thead>
                                    <tr>
                                        <th>Item Desc</th>
                                        <th>Qty</th>
                                        <th>Unit Price</th>
                                        <th>Total Amt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests->purchaseRequest as $request)
                                    <tr>
                                        <td>
                                            {{-- <input type="text" class="form-control" readonly value=""> --}}
                                            {{ Str::words($request->item->description, 5, ' ...') }}
                                            <input type="hidden" name="inventory[{{ $loop->index }}][item_id]" value="{{ $request->item->id }}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control quantity bg-transparent border-0" name="inventory[{{ $loop->index }}][quantity]" value="{{ $request->quantity }}" id="quantity{{ $loop->index }}" readonly>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control unitPrice" name="inventory[{{ $loop->index }}][offer_price]" value="" id="offer_price{{ $loop->index }}" required>
                                            @error('offer_price')
                                            <h6 class="text-danger"></h6>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control totalAmt" name="inventory[{{ $loop->index }}][total_amt]" value="" id="totalAmt{{ $loop->index }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Grand Total</td>
                                        <td><input type="text" readonly class="form-control border-0 bg-transparent" name="grand_total"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            dropdownParent: $("#exampleModal")
        });

        $('#dtable').DataTable();

        $('#modalTable').DataTable();

        $('#dataTable').DataTable();

        $(document).on('input', '.unitPrice', function(event) {
            var rowIdx = $("#modalTable").DataTable().row($(this).closest("tr")).index()

            this.value = this.value.replace(/[^0-9]/g, '');

            if (isNaN($(this).val()) || $(this).val() < 0 || $(this).val() === "") {
                $("#totalAmt" + rowIdx).val(0);
                $(this).focus();
                return 0;
            }

            $("#totalAmt" + rowIdx).val(parseFloat($("#quantity" + rowIdx).val()) * parseFloat($(this).val()));
            $(this).focus();
            calculateGrandTotal();
        });

        function calculateGrandTotal() {
        var grandTotal = 0;
        $('.totalAmt').each(function() {
            var totalAmt = parseFloat($(this).val()) || 0;
            grandTotal += totalAmt;
        });
        $('input[name="grand_total"]').val(grandTotal.toFixed(2));
    }

    calculateGrandTotal();
    });

</script>

@endsection
