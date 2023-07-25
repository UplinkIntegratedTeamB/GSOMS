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
    <form action="{{ route('ics.update', $id) }}" method="POST">
        @csrf
        <div class="card-body row">
            <div class="col">
                <div class="form-group">
                    <label for="">PR No.</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $ics->requestDetail->pr_no }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Serial Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Serial Number" name="serial_number" value="{{ $ics->serial_number }}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Fund Cluster</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Fund Cluster" name="fund_cluster" value="{{ $ics->fund_cluster }}" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Estimated Usefel Life</label>
                    <div class="input-group">
                        <input type="text" name="usefel_life" placeholder="Usefel Life" value="{{ $ics->usefel_life }}" class="form-control">
                    </div>
                    {{-- <select name="usefel_life" class="form-control select2" id="">
                        <option value="" disabled selected>Select Usefel Life</option>
                    </select> --}}
                </div>
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary mt-2" style="float: right">Save</button>
            </div>
        </div>
    </form>
</div>

@endsection
