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

<div class="container-fluid">


    <form action="{{ route('suppliers.store') }}" method="POST" class="shadow-lg p-4">
        @csrf
        <h5 class="my-3">Create Supplier</h5>

        <div class="row ">
            <div class="col">
                <div class="form-group">
                    <label for="">Supplier</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old("name") }}" autofocus>
                    @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="">Control Number</label>
                    <input type="text" name="control_no" class="form-control" readonly value="{{ $date }}" value="{{ old("control_no") }}" autofocus>
                    @error('control_no')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="">Organization Type</label>
                    <input type="text" name="org_type" class="form-control" placeholder="Organization Type" value="{{ old("org_type") }}" autofocus>
                    @error('org_type')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="">Expiration Date</label>
                    <input type="date" name="expiration_date" class="form-control" value="{{ $exp }}" value="{{ old("expiration_date") }}" autofocus>
                    @error('expiration_date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Class Type</label>
                    <select name="class_type_id" id="" class="select2 form-control">
                        <option value="" disabled selected>Select Class Type</option>
                        @foreach ($classTypes as $classType)
                        <option value="{{ $classType->id }}">{{ $classType->name }}</option>
                        @endforeach
                    </select>
                    @error('class_type_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Address" value="{{ old("address") }}" autofocus>
                    @error('address')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                {{-- <div class="form-group mt-2">
                    <label for="">Code</label>
                    <input type="text" name="code" class="form-control" placeholder="Code" value="{{ old("code") }}" autofocus>
                    @error('code')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div> --}}
                <div class="form-group mt-2">
                    <label for="">Document Submitted</label>
                    <input type="text" name="doc_submitted" class="form-control" placeholder="Documents" value="{{ old("doc_submitted") }}" autofocus>
                    @error('doc_submitted')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="">Other Info</label>
                    <input type="text" name="other_info" class="form-control" placeholder="Other Information" value="{{ old("other_info") }}" autofocus>
                    @error('other_info')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="mt-3 btn btn-primary" style="float: right; width: 10%">Save</button>
            </div>
        </div>
    </form>
</div>

@endsection
