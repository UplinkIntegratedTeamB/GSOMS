@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>PAR</h5>
    </div>
    <form action="{{ route('par.store', $id) }}" method="POST" id="formPr">
        @csrf
        <div class="card-body row">
            <div class="col">
                <div class="form-group">
                    <label for="">PR No.</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $requests->pr_no }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Department</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $requests->department->name }}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Serial Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="serial_number" placeholder="Serial Number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Date</label>
                    <div class="input-group">
                        <input type="date" name="date" value="{{ date('Y-m-d') }}"  class="form-control">
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" type="button" onclick="confirmSave(event)" style="float: right">Save</button>
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
