@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>Bidding Requisition and Issue Slip</h5>
    </div>
    <form action="{{ route('ris-bid.store', $id) }}" method="POST" id="formPr">
        @csrf
        <div class="card-body row">
            <div class="col">
                <div class="form-group">
                    <label for="">Department</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $requests->department->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Division</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly placeholder="No Division" value="{{ $requests->division?->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Section</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly placeholder="No Section" value="{{ $requests->section?->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">PR No.</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $requests->pr_no }}">
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                    <div class="col form-group">
                        <label for="">RIS No.</label>
                        <div class="input-group">
                            <input type="text" class="form-control" readonly value="{{ $date }}">
                        </div>
                    </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="">AIR No.</label>
                        <div class="input-group">
                            <input type="text" name="" class="form-control" readonly value="{{ $requests->acceptanceInspection->c_number }}">
                        </div>
                    </div>
                    <div class="col form-group">
                        <label for="">AIR Date</label>
                        <div class="input-group">
                            <input type="date" name="" class="form-control" readonly value="{{ date('Y-m-d', strtotime($requests->acceptanceInspection->created_at)) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Purpose</label>
                    <textarea name="" id="" class="form-control" cols="50" rows="4" readonly>{{ $requests->purpose }}</textarea>
                </div>
            </div>
            <div class="mt-4">
                <button class="btn btn-primary" type="button" onclick="confirmSave(event)" style="float: right">Save</button>
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

        $('#dataTable').DataTable();

    </script>
</div>

@endsection
