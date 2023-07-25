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

<div class="container-fluid card">
    <div class="card-header">
        <h5>ICS</h5>
    </div>
    <form action="{{ route('ics.store', $id) }}" method="POST" id="formPr">
        @csrf
        <div class="card-body row">
            <div class="col">
                <div class="form-group">
                    <label for="">PR No.</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $ics->pr_no }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Serial Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Serial Number" name="serial_number">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Fund Cluster</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Fund Cluster" name="fund_cluster" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Estimated Usefel Life</label>
                    <div class="input-group">
                        <input type="text" name="usefel_life" placeholder="Usefel Life" class="form-control">
                    </div>
                    {{-- <select name="usefel_life" class="form-control select2" id="">
                        <option value="" disabled selected>Select Usefel Life</option>
                    </select> --}}
                </div>
            </div>
            <div class="">
                <button type="button" onclick="confirmSave(event)" class="btn btn-primary mt-2" style="float: right">Save</button>
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
