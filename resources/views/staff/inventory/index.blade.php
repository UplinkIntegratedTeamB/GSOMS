@extends('layouts.app')

@section('content')

<style>

    span .selection {
        width: 100%;
    }

</style>

<div class="container-fluid card">
    <div class="card-header">
        <h4>Inventory Master List</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" data-table table table-bordered" id="inventory">
                <thead>
                    {{-- <tr>
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
                        <th></th>
                    </tr> --}}
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Item Type</th>
                        <th>Unit Type</th>
                        <th>Unit Price</th>
                        <th>Qty on Hand</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr     >
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->itemType->type }}</td>
                            <td>{{ $item->unit->description }}</td>
                            <td>{{ $item?->quantity }}</td>
                            <td>{{ $item?->unit_price }}</td>
                            <td>
                                <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $('.data-table').DataTable();
// $(function() {
    //     const table = $('.data-table').DataTable({
    //         "order": [[0, "desc"]]
    //         , ajax: {
    //             url: "{{ route('inventory.index') }}"
    //             , data: function(d) {
    //                 d.category_id = $('#category_id').val()
    //                     , d.search = $('input[type="search"]').val()
    //             }
    //         }
    //         , columns: [{
    //                 data: 'id'
    //                 , name: 'id'
    //             }
    //             , {
    //                 data: 'category_id'
    //                 , name: 'category_id'
    //             }

    //             , {
    //                 data: 'description'
    //                 , name: 'description'
    //                 , render: function(data, type, row) {
    //                     // Limit description to 5 words
    //                     var words = data.split(' ').slice(0, 6).join(' ');
    //                     return words + (data.split(' ').length > 3 ? '...' : '');
    //                 }
    //             }
    //             , {
    //                 data: 'item_type_id'
    //                 , name: 'item_type_id'
    //                 , render: function(data, type, row) {
    //                     // Limit description to 5 words
    //                     var words = data.split(' ').slice(0, 6).join(' ');
    //                     return words + (data.split(' ').length > 3 ? '...' : '');
    //                 }
    //             }
    //             , {
    //                 data: 'unit_id'
    //                 , name: 'unit_id'
    //             }
    //             , {
    //                 data: 'unit_price'
    //                 , name: 'unit_price'
    //             }
    //             , {
    //                 data: 'quantity'
    //                 , name: 'quantity'
    //             }
    //             , {
    //                 data: 'edit'
    //                 , name: 'edit'
    //             }
    //         , ]
    //         , columnDefs: [{
    //             orderable: false,
    //             targets: [0,1,2,3,4,5,6],
    //         }]
    //     });
    //     $('#category_id').change(function() {
    //         table.draw();
    //     });
    // })

</script>
@endsection
