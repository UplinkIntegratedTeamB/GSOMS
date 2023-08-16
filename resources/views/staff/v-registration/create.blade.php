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

    .inventory_item.selected_tr {
        background: gray;
        opacity: 0.5;
    }

    textarea.is-invalid {
        border-color: red !important;
    }

</style>


<div class="container-fluid card">
    <div class="card-header">
        <h5>Register Vehicle</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('vehicle.store') }}" method="POST" id="formPr">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="type" id="" class="form-control select2">
                            <option value="" selected disabled>Select Type</option>
                            <option value="0" {{ old('type') == '0' ? 'selected' : '' }}>4 Wheeler Plus</option>
                            <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Motor</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Engine No.</label>
                        <input type="text" placeholder="Engine No." name="engine_no" value="{{ old('engine_no') }}" class="form-control">
                    </div>
                    @error('engine_no')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Chasis No.</label>
                        <input type="text" placeholder="Chasis No." name="chasis_no" value="{{ old('chasis_no') }}" class="form-control">
                    </div>
                    @error('chasis_no')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Body Color</label>
                        <input type="text" placeholder="Body Color" name="body_color" value="{{ old('body_color') }}" class="form-control">
                    </div>
                    @error('body_color')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Gross Weight</label>
                        <input type="text" placeholder="Gross Weight" name="weight" class="form-control" value="{{ old('weight') }}">
                    </div>
                    @error('weight')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="row">
                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="">Next Renewal for LTO start</label>
                                <input type="date" name="lto_start" value="{{ old('lto_start') }}" class="form-control">
                            </div>
                            @error('lto_start')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="form-group mt-2">
                                <label for="">Next Renewal for LTO until </label>
                                <input type="date" name="lto_until" value="{{ old('lto_until') }}" class="form-control">
                            </div>
                            @error('lto_until')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="">New or Deed of Donation</label>
                        <select name="new_donation" id="" class="form-select select2">
                            <option value="" disabled selected>Select here</option>
                            <option value="0" {{ old('new_donation') == '0' ? 'selected' : '' }} >New</option>
                            <option value="1" {{ old('new_donation') == '1' ? 'selected' : '' }} >Donation</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Make and Type of Body</label>
                        <input type="text" name="make_type_body" class="form-control" placeholder="Make and Type of Body" value="{{ old('make_type_body') }}">
                    </div>
                    @error('make_type_body')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Description</label>
                        <input type="text" name="description" placeholder="Description" value="{{ old('description') }}" class="form-control">
                    </div>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Plate / Sticker</label>
                        <input type="text" name="plate_no" placeholder="Plate / Sticker" value="{{ old('plate_no') }}" class="form-control">
                    </div>
                    @error('plate_no')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Amount</label>
                        <input type="text" name="amount" placeholder="Amount" value="{{ old('amount') }}" class="form-control">
                    </div>
                    @error('amount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mt-2">
                        <label for="">Next Renewal for GSIS</label>
                        <input type="date" name="gsis" value="{{ old('gsis') }}" class="form-control">
                    </div>
                    @error('gsis')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary" type="submit" onclick="confirmSave(event)" style="float: right" >Save</button>
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
