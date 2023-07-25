@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>PAR</h5>
    </div>
    <form action="{{ route('par.update', $id) }}" method="POST">
        @csrf
        <div class="card-body row">
            <div class="col">
                <div class="form-group">
                    <label for="">PR No.</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $pars->requestDetail->pr_no }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Department</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly value="{{ $pars->requestDetail->department->name }}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Serial Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="serial_number" value="{{ $pars->serial_number }}" placeholder="Serial Number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Date</label>
                    <div class="input-group">
                        <input type="date" name="date" value="{{ date('Y-m-d', strtotime($pars->created_at)) }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" style="float: right">Save</button>
            </div>
        </div>
    </form>
</div>

@endsection
