@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Request for Quotation</h5>
        </div>
        <form action="{{ route('rfq.update', $id) }}" method="POST" id="formPr">
            @csrf
            <div class="card-body row">
                <div class="col">
                    {{-- <input type="text" name="request_detail_id" value="{{ $id }}" hidden> --}}
                    <div class="form-group">
                        <label for="">Quotation No.</label>
                        <div class="input-group">
                            <input type="text" class="form-control" readonly name="quotation_no" value="{{ $quotations->quotation_no }}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Department</label>
                        <div class="input-group">
                            <input type="text" class="form-control" readonly value="{{ $quotations->requestDetail->department->name }}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Purpose</label>
                        <div class="input-group">
                            <textarea name="" id="" class="form-control" disabled>{{ $quotations->requestDetail->purpose }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Division</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" value="{{ $quotations->requestDetail->division?->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">PR No.</label>
                        <div class="input-group">
                            <input type="text" class="form-control" readonly value="{{ $quotations->requestDetail->pr_no }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Date</label>
                        <div class="input-group">
                            <input type="date" name="date" class="form-control" value="{{ $quotations->date }}" autofocus>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="container-fluid table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Item No.</th>
                                    <th>Item Description</th>
                                    <th>Qty</th>
                                    <th>Unit</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalCost = 0;
                                @endphp
                                @foreach ($quotations->requestDetail->purchaseRequest as $pr)
                                <tr>
                                    <td>{{ $pr->item_id }}</td>
                                    <td>{{ $pr->item->description }}</td>
                                    <td>{{ $pr->quantity }}</td>
                                    <td>{{ $pr->item->itemType->type }}</td>
                                    <td>{{ number_format($pr->item->unit_price, 2) }}</td>
                                    <td>{{ number_format($pr->estimated_cost, 2) }}</td>
                                </tr>
                                @php
                                $totalCost += $pr->estimated_cost;
                                @endphp
                                @endforeach
                            </tbody>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td>{{ number_format($totalCost, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="button" onclick="confirmSave(event)" class="btn btn-primary" style="float: right; width: 10%">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function confirmSave(event) {
        event.preventDefault(); // Prevent the default form submission

        Swal.fire({
            title: 'Are you sure?'
            , text: 'You are about to update this form.'
            , icon: 'question'
            , showCancelButton: true
            , confirmButtonText: 'Update'
            , cancelButtonText: 'Cancel'
        , }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formPr').submit(); // Submit the form
            }
        });
    }

    $(document).ready(function() {
        $('#dataTable').DataTable();
    })

</script>

@endsection
