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

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Purchase Order</h5>
        </div>
        <form action="{{ route('po-bid.update', $pos->biddingPurchaseOrder->id) }}" method="POST" id="formPr">
            @csrf
            <div class="card-body row">
                <div class="col">
                    <input type="text" hidden value="{{ $pos->id }}" name="request_detail_id">
                    <div class="form-group">
                        <label for="">P.O No.</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="P.O No." name="" value="{{ $pos->biddingPurchaseOrder->po_no }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Department</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Office/Department" value="{{ $pos->department->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Supplier</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Supplier" value="{{ $supplier->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Address" value="{{ $supplier->address }}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Conforme Date</label>
                            <div class="input-group">
                                <input type="date" class="form-control" name="confirm_date" value="{{ date('Y-m-d', strtotime($pos))  }}" autofocus>
                            </div>
                        </div>
                        <div class="col">
                            <label for="">Delivery Date</label>
                            <div class="input-group">
                                <input type="date" name="delivery_date" value="{{ date('Y-m-d', strtotime($pos)) }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="form-group">
                        <label for="">PR No.</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="PR No." value="{{ $pos->pr_no }}" name="" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Section</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="No Section Selected" value="{{ $pos->section?->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Place of Delivery</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Place of Delivery" value="{{ $pos->endUserOffice->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Payment Term</label>
                        <select name="payment_term" class="select2 form-control" id="">
                            <option value="" disabled>Select Payment Term</option>
                            <option value="Cash on Delivery" {{ $pos->biddingPurchaseOrder->payment_term === 'Cash on Delivery' ? 'selected' : '' }}>Cash on Delivery</option>
                            <option value="Online Payment" {{ $pos->biddingPurchaseOrder->payment_term === 'Online Payment' ? 'selected' : '' }}>Online Payment</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for=""> No. of Days </label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="No. of Days" name="no_of_days" value="{{ $pos->biddingPurchaseOrder->no_of_days }}" autofocus>
                            </div>
                        </div>
                        <div class="col">
                            <label for="">Delivery Term</label>
                            <select name="delivery_term" id="" class="select2 form-control">
                                <option value="" disabled>Select Delivery Term</option>
                                <option value="1" {{ $pos->biddingPurchaseOrder->delivery_term === '1' ? 'selected' : '' }}>Pick-up</option>
                                <option value="2" {{ $pos->biddingPurchaseOrder->delivery_term === '2' ? 'selected' : '' }}>Delivery w/in Calendar days from receipt of PO</option>
                                <option value="3" {{ $pos->biddingPurchaseOrder->delivery_term === '3' ? 'selected' : '' }}>As per schedule</option>
                            </select>

                        </div>
                    </div>
                </div>

                <table class="table table-bordered mt-5" id="dataTable">
                    <thead>
                        <tr>
                            <th>Item No.</th>
                            <th>Item Description</th>
                            <th>Unit of Issue</th>
                            <th>Quantity</th>
                            <th> Unit cost</th>
                            <th>Total Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pos->purchaseRequest as $request)
                        <tr>
                            <td>{{ $request->item_id }}</td>
                            <td>{{ $request->item->description }}</td>
                            <td>{{ $request->item->itemType->type }}</td>
                            <td>{{ $request->quantity }}</td>
                            <td>{{ $request->unit_price }}</td>
                            <td>{{ $request->estimated_cost }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-4" style="float: right">
                <button class=" btn btn-primary" onclick="confirmSave(event)" type="button">Save</button>
            </div>
        </form>
    </div>

    <script>
        function confirmSave(event) {
            event.preventDefault(); // Prevent the default form submission

            Swal.fire({
                title: 'Are you sure?'
                , text: 'You are about to update the form.'
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

        $('#dataTable').DataTable();

    </script>

</div>

@endsection
