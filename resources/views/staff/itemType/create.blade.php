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
        <h5>Add Item Types</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('itemType.store') }}" method="POST" id="formPr">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Type</label>
                        <div class="input-group">
                            <input type="text" name="type" placeholder="Type" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control select2">
                            <option value="" selected disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button type="button" onclick="confirmSave(event)" style="float: right" class="btn btn-primary">Save</button>
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
