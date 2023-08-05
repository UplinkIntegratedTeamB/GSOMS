@extends('layouts.app')

@section('content')

<style>

    span .selection {
        width: 100%;
    }

</style>

<div class="container-fluid">
    <div class="text-center">
        <h1>Inventory Master List</h1>
    </div>

    <div class="container pt-5">

      <div class="table-responsive">
        <table class=" data-table table table-bordered" id="inventory">
            <thead>
                <tr>
                    <th></th>
                    <th>
                        <select name="category" id="category_id" class="select2 filter form-control">
                            <option value="" selected>Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Item Type</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center">Qty on Hand</th>
                    <th class="text-center">Unit Price</th>
                </tr>
            </thead>
            <tbody class="text-center">
            </tbody>
        </table>
      </div>
    </div>
</div>


<script>
    $(function() {
        const table = $('.data-table').DataTable({
            "order": [[0, "desc"]]
            , ajax: {
                url: "{{ route('inventory.index') }}"
                , data: function(d) {
                    console.log(d)
                    d.category_id = $('#category_id').val()
                        , d.search = $('input[type="search"]').val()
                }
            }
            , columns: [{
                    data: 'id'
                    , name: 'id'
                }
                , {
                    data: 'category_id'
                    , name: 'category_id'
                }

                , {
                    data: 'description'
                    , name: 'description'
                }
                , {
                    data: 'item_type_id'
                    , name: 'item_type_id'
                }
                , {
                    data: 'unit_id'
                    , name: 'unit_id'
                }
                , {
                    data: 'quantity'
                    , name: 'quantity'
                }
                , {
                    data: 'unit_price'
                    , name: 'unit_price'
                }
             ]
            , columnDefs: [{
                orderable: false,
                targets: [0,1,2,3,4,5,6],
            }]
        });
        $('#category_id').change(function() {
            table.draw();
        });
    })

</script>
@endsection
