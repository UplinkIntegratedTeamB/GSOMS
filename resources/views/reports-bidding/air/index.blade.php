@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h5>Bidding AIR</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table talbe-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>AIR No.</th>
                        <th>PR No.</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($airs as $air)
                    @if((!$air->acceptanceInspection == null))
                   <tr>
                       <td>{{ $air->acceptanceInspection->c_number }}</td>
                       <td>{{ $air->pr_no }}</td>
                       <td>{{ date('F d, Y', strtotime($air->acceptanceInspection->created_at)) }}</td>
                       <td>
                           <a href="{{ route('pdf.biddingAir', $air->acceptanceInspection->request_detail_id) }}" class="btn btn-primary"><i class="fas fa-file-pdf"></i></a>
                           @if($air->status == 11)
                           <a href="{{ route('air-bid.edit', $air->acceptanceInspection->request_detail_id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                           <a href="{{ route('air-bid.delete', ['id' => $air->acceptanceInspection->id, 'rid' => $air->acceptanceInspection->request_detail_id]) }}" type="button" onclick="confirmDelete(event)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                           @else
                           <a href="" class="btn btn-secondary disabled" onclick="return false"><i class="fas fa-trash"></i></a>
                           <a href="" class="btn btn-info disabled" onclick="return false"><i class="fas fa-edit"></i></a>
                           @endif
                       </td>
                   </tr>
                   @endif
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Prevent the default form submission

            const deleteURL = event.currentTarget.getAttribute('href');

            Swal.fire({
                title: 'Are you sure?'
                , text: 'You want to delete this AIR?'
                , icon: 'question'
                , showCancelButton: true
                , confirmButtonText: 'Delete'
                , cancelButtonText: 'Cancel'
            , }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteURL; // Navigate to the specified URL
                }
            });
        }


        $('#dataTable').DataTable({
            "order": [[0, "desc"]]
        });

    </script>
</div>

@endsection
