@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>Abstract of Bid Printing</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('abstract-bid.addAttendance', ['id' => $id, 'rid' => $abstract->request_detail_id]) }}" id="formPr">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">BAC Chairman:</label>
                        <div class="input-group">
                            <input type="text" name="bac_chairman" placeholder="BAC Chairman" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">BAC Member:</label>
                        <div class="input-group">
                            <input type="text" name="member_1" placeholder="BAC Member" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">BAC Member:</label>
                        <div class="input-group">
                            <input type="text" name="member_3" placeholder="BAC Member" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">BAC Member:</label>
                        <div class="input-group">
                            <input type="text" name="member_5" placeholder="BAC Member" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">BAC Vice Chairman:</label>
                        <div class="input-group">
                            <input type="text" name="bac_vc" placeholder="BAC-VICE CHAIRMAN" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">BAC Secretariat Member:</label>
                        <div class="input-group">
                            <input type="text" name="secretariat" placeholder="End - User Unit" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">BAC Member:</label>
                        <div class="input-group">
                            <input type="text" name="member_2" placeholder="BAC CHAIRMAN" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">BAC Member:</label>
                        <div class="input-group">
                            <input type="text" name="member_4" placeholder="BAC CHAIRMAN" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="button" onclick="confirmSave(event)" style="float: right">Save</button>
                </div>
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
