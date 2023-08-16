@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>Invitation of Bids</h5>
    </div>
    <div class="card-body">
    <form action="{{ route('invitation-bid.update', $bidInvitation->id) }}" method="POST" id="formPr">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group ">
                        <label for="">Issuance of Bid Document</label>
                        <input type="date" name="issuance_of_bid" class="form-control" value="{{ $bidInvitation->issuance_of_bid }}">
                    </div>
                    @error('issuance_of_bid')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Bidding Pre-Procurement Conference</label>
                        <input type="date" class="form-control" name="pre_procurement" placeholder="Number of Days" value="{{ $bidInvitation->pre_procurement }}">
                    </div>
                    @error('pre_procurement')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Number of Days</label>
                        <input type="number" class="form-control" name="day" placeholder="Number of Days" value="{{ $bidInvitation->day }}">
                    </div>
                    @error('date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Post Start</label>
                        <input type="date" name="start" class="form-control" value="{{ $bidInvitation->start }}">
                    </div>
                    @error('start')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Post Until</label>
                        <input type="date" name="until" class="form-control" value="{{ $bidInvitation->until }}">
                    </div>
                    @error('until')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Opening of Bid</label>
                        <input type="date" name="opening_of_bids" class="form-control" value="{{ $bidInvitation->opening_of_bids }}">
                    </div>
                    @error('opening_of_bids')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Pre-Bid Conference</label>
                        <input type="date" name="pre_bid" class="form-control" value="{{ $bidInvitation->pre_bid }}">
                    </div>
                    @error('pre_bid')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Bid Evaluation</label>
                        <input type="date" name="bid_evaluation" class="form-control" value="{{ $bidInvitation->bid_evaluation }}">
                    </div>
                    @error('bid_evaluation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Post Qualification</label>
                        <input type="date" name="post_qualification" class="form-control" value="{{ $bidInvitation->post_qualification }}">
                    </div>
                    @error('post_qualification')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Notice of Award</label>
                        <input type="date" name="notice_of_award" class="form-control" value="{{ $bidInvitation->notice_of_award }}">
                    </div>
                    @error('notice_of_award')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary" type="button" style="float: right" onclick="confirmSave(event)">Save</button>
            </div>
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
