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
            <h5>Abstract of Bid</h5>
        </div>

        <div class="card-body row">
            <div class="col">
                <div class="form-group">
                    <label for="">PR No.</label>
                    <div class="input-group">
                        <input type="text" readonly class="form-control" value="{{ $abstracts->requestDetail->pr_no }}">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">Purpose</label>
                    <div class="input-group">
                        <textarea name="" class="form-control" rows="1" readonly placeholder="Purpose" required>{{ $abstracts->purpose }}</textarea>
                    </div>
                </div>
                @error('purpose')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group mt-2">
                    <label for="">Cash Bond</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ number_format($abstracts->cash_bond, 2) }}" min="1"placeholder="Cash Bond">
                    </div>
                </div>
                @error('cash_bond')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Department/Office</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $abstracts->requestDetail->department->name }}">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">Current Date</label>
                    <div class="input-group">
                        <input type="text" readonly class="form-control" value="{{ date('F j, Y', strtotime(now())) }}">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">Evaluated Budget Cost</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ number_format($abstracts->requestDetail->grand_total, 2) }}" readonly>
                    </div>
                </div>
            </div>
            <input type="text" name="winner" id="winner" hidden>
        </div>

        <div class="container-fluid table-responsive">
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
                    @foreach ($abstracts->requestDetail->purchaseRequest as $request)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $request->item->id }}</td>
                        <td>{{ Str::words($request->item->description, 5, ' ...') }}</td>
                        <td>{{ $request->quantity }}</td>
                        <td>{{ number_format((float)$request->unit_price, 2) }}</td>
                        <td>{{ number_format($request->estimated_cost, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="container-fluid mt-5 card">
            @if($errors->any())
            @foreach($errors->all() as $error)
            <h6 class="text-danger">{{ $error }}</h6>
            @endforeach
            @endif
            <div class="card-header row">
                <div class="col">
                    <h5>Suppliers</h5>
                </div>
                <div class="col" style="text-align: end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <div class="card-body m-0 p-0 table-responsive">
                <table class="table table-striped table-hover" id="dtable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Supplier</th>
                            <th>Grand Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($abstracts->biddingOffereds as $abstract)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $abstract->supplier->name }}</td>
                            <td>{{ number_format($abstract->grand_total, 2) }}</td>
                            <td>
                                <a href="{{ route('abstract-bid.removeItem', $abstract->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="viewBtn" data-id="{{ $abstracts->id }}" data-offered="{{ $abstract->id }}"><i class="fas fa-eye"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('abstract-bid.addSupplier', $id) }}" method="POST">
                @csrf
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-4">
                                <label for="">Supplier</label> <br>
                                <select name="supplier_id" id="supplier_${supplierLength}" class="form-control select2" style="width: 100%">
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
                                    @foreach ($abstracts->requestDetail->purchaseRequest as $request)
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
                                        </td>
                                        <td>
                                            <input type="text" class="form-control totalAmt text-end bg-transparent border-0" name="inventory[{{ $loop->index }}][total_amt]" value="" id="totalAmt{{ $loop->index }}" readonly>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Grand Total</td>
                                        <td><input type="text" readonly class="form-control border-0 bg-transparent" style="text-align: end" name="grand_total"></td>
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
            </form>
        </div>
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <form id="updateForm" action="{{ route('abstract-bid.update', ':id') }}" method="POST">
                @csrf
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered" id="modalTableView">
                                <thead>
                                    <tr>
                                        <th>Item Desc</th>
                                        <th>Qty</th>
                                        <th>Unit Price</th>
                                        <th>Total Amt</th>
                                    </tr>
                                </thead>
                                <tbody id="tableView">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Grand Total</td>
                                        <td><input type="text" readonly class="form-control border-0 bg-transparent" style="text-align: end" id="gtotal" name="grand_total"></td>
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
            </form>
        </div>
        <div class="m-3">
            <a href="{{ route('abstract-bid.compute', $id) }}" style="float: right" type="button" onclick="confirmSave(event)" class="btn btn-primary">Compute</a>
        </div>
    </div>
</div>

<script>
    function confirmSave(event) {
        event.preventDefault(); // Prevent the default form submission

        const compute = event.currentTarget.getAttribute('href');

        Swal.fire({
            title: 'Are you sure?'
            , text: 'You cant change this when you save it!'
            , icon: 'question'
            , showCancelButton: true
            , confirmButtonText: 'Save'
            , cancelButtonText: 'Cancel'
        , }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = compute; // Navigate to the specified URL
            }
        });
    }

    $(document).ready(function() {
        $('.select2').select2({
            dropdownParent: $("#exampleModal")
        });

        $('#dtable').DataTable();

        $('#modalTable').DataTable();

        $('#modalTableView').DataTable();

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

    $(document).ready(function() {
        $('#dtable').on('click', "#viewBtn", function() {
            fetch("{{ config('app.url') }}" + '/abstract-bid/' + $(this).data('id'))
                .then(response => response.json())
                .then(abstract => {
                    let html = '';
                    const tableLength = $('#example tbody tr').length;
                    const offers = $(this).data('offered');
                    $("#updateForm").attr('action',"{{ config('app.url') }}" + '/abstract-bid/' + $(this).data('offered'));
                    if (abstract.bidding_offereds) {
                        $(".custom-tr").remove();
                        abstract.bidding_offereds.forEach(function(firstSupplierOffered, idx) {
                            $('#gtotal').val(firstSupplierOffered.grand_total);
                            if (firstSupplierOffered.id == offers) {
                                firstSupplierOffered.bidding_offered_items.forEach(function(item, index) {
                                    console.log(item)
                                    if (offers == item.bidding_offered_id) {
                                        const rowIdx = tableLength + index;

                                        html += `
                                        <tr class="custom-tr">
                                            <td>
                                                ${item.item.description}
                                                <input type="hidden" name="inventory[${rowIdx}][item_id]" value="${item.id}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control quantity bg-transparent border-0" name="inventory[${rowIdx}][quantity]" value="${item.quantity}" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control unitPriceView" name="inventory[${rowIdx}][offer_price]" value="${item.offer_price}" id="offer_price" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control totalAmt text-end bg-transparent border-0" name="inventory[${rowIdx}][total_amt]" value="${item.total_amt}" id="totalAmt" readonly>
                                            </td>
                                        </tr>
                                    `;
                                    }
                                });
                            }
                        });
                    };

                    $('#tableView').prepend(html);
                    calculateGrandTotalView();

                    $("#modalTableView tbody").on('input', 'tr #offer_price', function(event) {
                        const rowIndx = $(this).closest("tr").index();

                        this.value = this.value.replace(/[^0-9]/g, '');

                        if (isNaN($(this).val()) || $(this).val() < 0 || $(this).val() === "") {
                            $("#modalTableView tbody tr:eq(" + rowIndx + ") td #totalAmt").val(0);
                            calculateGrandTotalView()
                            $(this).focus();
                            return 0;
                        }

                        $("#modalTableView tbody tr:eq(" + rowIndx + ") td #totalAmt").val(parseFloat($("#modalTableView tbody tr:eq(" + rowIndx + ") td input[name='inventory[" + rowIndx + "][quantity]']").val()) * parseFloat($(this).val()));
                        $(this).focus();
                        calculateGrandTotalView()
                    });
                });
        });

        function calculateGrandTotalView() {
            let grandTotal = 0;
            $('.totalAmt').each(function() {
                let totalAmt = parseFloat(this.value) || 0;
                grandTotal += totalAmt;
            })
            $('#gtotal').val(grandTotal.toFixed(2));
            console.log(grandTotal);
        }
        calculateGrandTotalView();
    });

</script>


@endsection
