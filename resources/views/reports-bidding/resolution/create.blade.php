@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>Bidding Resolution</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('resolution-bid.store', $id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Resolution No.</label>
                        <div class="input-group">
                            <input type="text" readonly value="{{ $cFormat }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Amout in words. ( P {{ number_format($grandTotal->grand_total, 2) }} ) </label>
                        <div class="input-group">
                            <textarea id="" name="amount_in_word" cols="47" rows="1" class="form-control" placeholder="Amount in Words"></textarea>
                        </div>
                    </div>
                    @error('amount_in_word')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group mt-2">
                        <label for=""> Obligation Request No. </label>
                        <div class="input-group">
                            <input id="" name="obr" class="form-control" placeholder="Obligation Request No." />
                        </div>
                    </div>
                    @error('amount_in_word')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">PR No.</label>
                        <div class="input-group">
                            <input type="text" class="form-control" readonly value="{{ $request->pr_no }}">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Department</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $request->department->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Delivery Term</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Delivery Term" name="delivery_term">
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" style="float: right">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
