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
                    <div class="form-group">
                        <label for="">Department</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $request->department->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Amout in words.</label>
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
                        <label for="">Invitation start</label>
                        <div class="input-group">
                            <input type="date" name="start" class="form-control">
                        </div>
                    </div>
                </div>
                @error('start')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="col">
                    <div class="form-group">
                        <label for="">PR No.</label>
                        <div class="input-group">
                            <input type="text" class="form-control" readonly value="{{ $request->pr_no }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Approved Date</label>
                        <div class="input-group">
                            <input type="date" name="apprv_date" class="form-control" >
                        </div>
                    </div>
                    @error('apprv_date')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Date and Time Start</label>
                        <div class="input-group">
                            <input type="datetime-local" name="date_time" class="form-control" >
                        </div>
                    </div>
                    @error('date_time')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Invitation until</label>
                        <div class="input-group">
                            <input type="date" name="until" class="form-control">
                        </div>
                    </div>
                    @error('until')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" style="float: right">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
