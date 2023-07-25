@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Create Bac Resolution</h5>
        </div>
        <form action="{{ route('bac.update', $id) }}" method="POST">
        @csrf
        <div class="card-body row">
                <div class="col">
                    <div class="form-group">
                        <label for="control_no">Control No.</label>
                        <div class="input-group">
                            <input type="text" name="control_no" readonly placeholder="Control Number" value="{{ $abstract->control_no }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="res_title">Resolution Title</label>
                        <div class="input-group">
                            <input type="text" name="res_title" placeholder="Resolution Title" class="form-control" value="{{ $abstract->res_title }}" autofocus>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="res_title">Item Details</label>
                        <div class="input-group">
                            <textarea type="text" name="item_details" placeholder="Item Details" class="form-control">{{ $abstract->item_details }}</textarea>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="meeting">Purchase Request No.</label>
                        <div class="input-group">
                            <input type="text" name="" readonly value="{{ $abstract->requestDetail->pr_no }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="proc">Procurement Mode</label>
                        <div class="input-group">
                            @if($abstract->requestDetail->procurement_mode == 1)
                            <input type="text" name="" placeholder="Procurement Mode" value="Bidding" readonly class="form-control">
                            @else
                            <input type="text" name="" placeholder="Procurement Mode" value="Shopping" readonly class="form-control">
                            @endif
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="meeting">Date of Meeting</label>
                        <div class="input-group">
                            <input type="date" name="meeting" value="{{ $abstract->meeting }}" class="form-control" value="{{ old("meeting") }}" autofocus>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="res_title">Amount in Words</label>
                        <div class="input-group">
                            <textarea type="text" name="amount_in_words" placeholder="Amount in Words" class="form-control">{{ $abstract->amount_in_words }}</textarea>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="meeting">Approve Date</label>
                        <div class="input-group">
                            <input type="date" name="apprv_date" class="form-control" value="{{ $abstract->apprv_date }}" autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary w-25 m-3" type="submit" style="float: right">Save</button>
        </form>
    </div>
</div>

@endsection
