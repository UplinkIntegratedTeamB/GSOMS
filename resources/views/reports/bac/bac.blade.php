@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Create Bac Resolution</h5>
        </div>
        <form action="{{ route('bac.store', $id) }}" method="POST" id="formPr">
            @csrf
            <div class="card-body row">
                <div class="col">
                    <div class="form-group">
                        <label for="control_no">Control No.</label>
                        <div class="input-group">
                            <input type="text" name="" readonly placeholder="Control Number" value="{{ $cFormat }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="res_title">Resolution Title</label>
                        <div class="input-group">
                            <input type="text" name="res_title" placeholder="Resolution Title" class="form-control" value="{{ old("res_title") }}" autofocus required>
                        </div>
                    </div>
                    @error('res_title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="res_title">Item Details</label>
                        <div class="input-group">
                            <textarea type="text" name="item_details" placeholder="Item Details" class="form-control" required>{{ old("item_details") }}</textarea>
                        </div>
                    </div>
                    @error('item_details')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Purchase Request No.</label>
                        <div class="input-group">
                            <input type="text" name="" readonly value="{{ $request->pr_no }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="proc">Procurement Mode</label>
                        <div class="input-group">
                            @if($request->procurement_mode == 1)
                            <input type="text" name="" placeholder="Procurement Mode" value="Bidding" readonly class="form-control">
                            @else
                            <input type="text" name="" placeholder="Procurement Mode" value="Shopping" readonly class="form-control">
                            @endif
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="meeting">Date of Meeting</label>
                        <div class="input-group">
                            <input type="date" name="meeting" value="" class="form-control" value="{{ old("meeting") }}" autofocus required>
                        </div>
                    </div>
                    @error('meeting')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group mt-2">
                        <label for="res_title">Amount in Words</label>
                        <div class="input-group">
                            <textarea type="text" name="amount_in_words" placeholder="Amount in Words" class="form-control" autofocus required>{{ old("amount_in_words") }}</textarea>
                        </div>
                    </div>
                    @error('amount_in_words')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="meeting">Approve Date</label>
                        <div class="input-group">
                            <input type="date" name="apprv_date" value="" class="form-control" value="{{ old("apprv_date") }}" autofocus required>
                        </div>
                    </div>
                    @error('apprv_date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary w-25 m-3" type="submit" style="float: right" onclick="confirmSave(event)">Save</button>
        </form>
    </div>

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
