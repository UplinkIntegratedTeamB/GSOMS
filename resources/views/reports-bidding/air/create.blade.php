@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>AIR</h5>
    </div>
    <form action="{{ route('air-bid.store', $id) }}" method="POST" id="formPr">
        @csrf
        <div class="card-body row">
            <div class="col">
                <div class="form-group">
                    <label for="">Control No..</label>
                    <div class="input-group">
                        <input type="text" name="c_number" class="form-control" readonly value="{{ $date }}">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">PO No.</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $details->biddingPurchaseOrder->po_no }}">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">Department</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $details->department->name }}">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">Section</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $details->section?->name }}" placeholder="No Section">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group ">
                    <label for="">PR No.</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $details->pr_no }}">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">PR Date</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ date('F d, Y', strtotime($details->created_at)) }}">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">Division</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $details->division?->name }}" placeholder="No Division">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="">Supplier</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $details->biddingAbstract->winners->name }}">
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button type="button" onclick="confirmSave(event)" class="btn btn-primary" style="float: right">Save</button>
            </div>
        </div>
    </form>

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
