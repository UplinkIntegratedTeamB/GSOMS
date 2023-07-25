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
    <div class="card">
        <div class="card-header">
            <h5>Add Item</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('item.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="select2 form-control" name="category_id">
                                <option value="" disabled>Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Item Type</label>
                            <select name="item_type_id" id="" class="select2 form-control">
                                <option value="" disabled selected>Select Item Type</option>
                                @foreach ($itemTypes as $itemType)
                                <option value="{{ $itemType->id }}">{{ $itemType->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Description</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Description" name="description" value="{{ old("description") }}" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Unit Type</label>
                            <select name="unit_id" id="" class="select2 form-control">
                                <option value="" disabled selected>Select Unit Type</option>
                                @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Unit Price</label>
                            <input type="text" class="form-control" placeholder="Unit Price" name="unit_price" value="{{ old("unit_price") }}" autofocus>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Quantity Available</label>
                            <input type="text" class="form-control" placeholder="Quantity ( Optional )" name="quantity" value="{{ old("quantity") }}" autofocus>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4" style="float: right">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection
