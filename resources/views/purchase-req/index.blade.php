@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Requests</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable">
                    <thead>
                        <tr>
                            <td>Purchase Request No.</td>
                            <td>Department</td>
                            <td>Division</td>
                            <td>Section</td>
                            <td>Date</td>
                            <td>Status</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                        <tr class="text-center">
                            <td>{{ $request->pr_no }}</td>
                            <td>{{ $request->department->name }}</td>
                            <td>{{ $request->division ? $request->division->name : '' }}</td>
                            <td>{{ $request->section ? $request->section->name : '' }}</td>
                            <td>{{ $request->date1 }}</td>
                            <td>
                                @if($request->procurement_mode_id == 2)
                                @if( $request->status === 1 )
                                <label for="" style="color: rgb(41, 194, 41);">Approved by Staff <br> ({{ $request->approvedByUser->name }}) </label>

                                @elseif($request->status === 2 )
                                <label for="" style="color: rgb(41, 194, 41);"> Your request will proceed to Budget Office</label>

                                @elseif ($request->status === 3 )
                                <label for="" style="color: rgb(41, 194, 41);">You're Obligation Request has been created <br> ({{ $request->approvedByUser->name }})</label>

                                @elseif($request->status === 4)
                                <label for="" style="color: rgb(41, 194, 41);">You're request is back in GSO for documents</label>

                                @elseif($request->status == 5)
                                <label for="" style="color: rgb(41, 194, 41);">For Creation of Documents <br> (Bac Resolution)</label>

                                @elseif($request->status == 6)
                                <label for="" style="color: rgb(41, 194, 41);">For Creation of Documents <br> (RFQ)</label>

                                @elseif($request->status == 7)
                                <label for="" style="color: rgb(41, 194, 41);">For Creation of Documents <br> (Abstract)</label>

                                @elseif($request->status == 8)
                                <label for="" style="color: rgb(41, 194, 41);">For Creation of Documents <br> (P.O)</label>

                                @elseif($request->status == 9)
                                <label for="" style="color: rgb(41, 194, 41);">For Creation of Documents <br> (AIR)</label>

                                @elseif($request->status == 10)
                                <label for="" style="color: rgb(41, 194, 41)">Please go to reports for the documents</label>

                                @elseif($request->status == 11)
                                <label for="" style="color: rgb(41, 194, 41)">Your PR is almost complete</label>
                                @else
                                <label class="mt-1" for="" style="color: rgb(0, 180, 24);">Pending</label>
                                @endif
                                @else
                                <label class="mt-1" for="" style="color: rgb(0, 180, 24);">Pending</label>
                                @endif
                            </td>
                            <td>
                                <div class="row">
                                    <div class="form-group">

                                        @user
                                        @if($request->status === 0)
                                        <a class="col btn btn-primary" href="{{ url("purchase-request/edit/$request->id") }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a class="col btn btn-danger" href="{{ route('purchaseRequest.removePr', ['id' => $request->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                                        <a class="col btn btn-info" href="{{ route('pdf.download', ['id' => $request->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF"><i class="fas fa-file-pdf"></i></a>
                                        @else
                                        <a class="col btn btn-primary" href="{{ route('pdf.download', $request->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF"><i class="fas fa-file-pdf"></i></a>
                                        <a class="col btn btn-primary" href="{{ route('purchaseRequest.preview', $request->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="fas fa-eye"></i></a>
                                        @endif
                                        @enduser

                                        @staff
                                        @if($request->procurement_mode_id == 2)
                                        @if($request->status === 0)
                                        <a class="col btn btn-primary" href="{{ url("purchase-request/edit/$request->id") }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('purchaseRequest.approve', ['id' => $request->id, 'uid' => auth()->id()]) }}" type="button" class="col btn btn-success" onclick="confirmApproval(event)" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve"><i class="fas fa-check text-white"></i></a>
                                        <a class="col btn btn-info" href="{{ route('pdf.download', ['id' => $request->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF"><i class="fas fa-file-pdf"></i></a>

                                        @if($request->user_id === auth()->id())
                                        <a class="col btn btn-danger" type="button" onclick="confirmDelete(event)" href="{{ route('purchaseRequest.removePr', ['id' => $request->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                                        @endif

                                        @elseif($request->status === 5)
                                        <a href="{{ route('bac.create', ['id' => $request->id]) }}" class="col btn btn-primary">Create Bac Res</a>

                                        @elseif($request->status === 6)
                                        <a href="{{ route('rfq.create', ['id' => $request->id]) }}" class="col btn btn-primary">Proceed to RFQ </a>

                                        @elseif($request->status === 7)
                                        <a href="{{ route('abstract.create', ['id' => $request->id]) }}" class="col btn btn-primary">Proceed to Abstract </a>

                                        @elseif($request->status === 8)
                                        <a href="{{ route('po.create', ['id' => $request->id]) }}" class="col btn btn-primary">Proceed to P.O </a>

                                        @elseif($request->status === 9)
                                        <a href="{{ route('air.create', $request->id) }}" class="col btn btn-primary">Proceed to AIR </a>

                                        @elseif($request->status == 10)
                                        @if($request->purchaseRequest[0]->item->itemType->category_id == 1)
                                        <a href="{{ route('ris.index') }}" class="col btn btn-primary">RIS</a>
                                        @elseif($request->purchaseRequest[0]->item->itemType->category_id == 2)
                                        @if($request->grand_total >= 200000)
                                        <a href="{{ route('ics.index') }}" class="col btn btn-info">ICS</a>
                                        @else
                                        <a href="{{ route('par.index') }}" class="col btn" style="background: rgb(163, 163, 255)">PAR</a>
                                        @endif
                                        @endif

                                        @elseif($request->status === 11)
                                        <a href="{{ route('purchaseRequest.complete', $request->id) }}" type="button" onclick="complete(event)" class="col btn btn-primary">Complete</a>
                                        @else
                                        <a class="col btn btn-primary" href="{{ url("purchase-request/view/$request->id") }}" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="fas fa-eye"></i></a>
                                        @endif
                                        @endif

                                        @if($request->procurement_mode_id == 1)
                                        @if($request->status === 0)
                                        <a class="col btn btn-primary" href="{{ url("purchase-request/edit/$request->id") }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('purchaseRequest.approve', ['id' => $request->id, 'uid' => auth()->id()]) }}" type="button" class="col btn btn-success" onclick="confirmApproval(event)" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve"><i class="fas fa-check text-white"></i></a>
                                        <a class="col btn btn-info" href="{{ route('pdf.download', ['id' => $request->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF"><i class="fas fa-file-pdf"></i></a>

                                        @elseif($request->status == 5)
                                        <a href="{{ route('abstract-bid.create', $request->id) }}" class="btn btn-primary">Abstract of Bid</a>
                                        @elseif($request->status == 6)
                                        <a href="{{ route('abstract-bid.show', $request->id) }}" class="btn btn-primary">Abstract of Bid</a>
                                        @elseif($request->status == 7)
                                        <a href="{{ route('abstract-bid.attendance', $request->biddingAbstract->id) }}" class="btn btn-primary">Attendance for Abstract</a>
                                        @elseif($request->status == 8)
                                        <a href="{{ route('resolution-bid.create', $request->id) }}" class="btn btn-primary">Resolution</a>
                                        @elseif($request->status == 9)
                                        <a href="{{ route('po-bid.create', $request->id) }}" class="btn btn-primary">Purchase Order</a>
                                        @elseif($request->status == 10)
                                        <a href="{{ route('air-bid.create', $request->id) }}" class="btn btn-primary">AIR</a>
                                        @elseif($request->status == 11)
                                        <a href="{{ route('ris-bid.create', $request->id) }}" class="btn btn-primary">RIS</a>
                                        @elseif($request->status === 12)
                                        <a href="{{ route('purchaseRequest.complete', $request->id) }}" class="col btn btn-primary" type="button" onclick="complete(event)">Complete</a>
                                        @else
                                        <a class="col btn btn-primary" href="{{ route('pdf.download', $request->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF"><i class="fas fa-file-pdf"></i></a>
                                        <a class="col btn btn-info" href="{{ route('purchaseRequest.preview', $request->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="fas fa-eye"></i></a>
                                        @endif
                                        @endif
                                        @endstaff
                                        @headstaff
                                        <a href="{{ route('purchaseRequest.approved', ['id' => $request->id, 'uid' => auth()->id()]) }}" type="button" onclick="confirmApproval(event)" class="col btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve"><i class="fas fa-check"></i></a>
                                        @endheadstaff
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function confirmApproval(event) {
        event.preventDefault(); // Prevent the default link behavior

        const apprvURL = event.currentTarget.getAttribute('href'); // Get the URL from the link element

        Swal.fire({
            title: 'Are you sure?'
            , text: 'You want to approve this Purchase Request?'
            , icon: 'question'
            , showCancelButton: true
            , confirmButtonText: 'Save'
            , cancelButtonText: 'Cancel'
        , }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = apprvURL; // Navigate to the specified route
            }
        });
    }

    function confirmDelete(event) {
        event.preventDefault(); // Prevent the default link behavior

        const deleteURL = event.currentTarget.getAttribute('href');

        Swal.fire({
            title: 'Are you sure?'
            , text: 'You want to delete this Purchase Request?'
            , icon: 'question'
            , showCancelButton: true
            , confirmButtonText: 'Delete'
            , cancelButtonText: 'Cancel'
        , }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteURL; // Navigate to the specified route
            }
        });
    }

    function complete(event) {
        event.preventDefault(); // Prevent the default link behavior

        const deleteURL = event.currentTarget.getAttribute('href');

        Swal.fire({
            title: 'Are you sure?'
            , text: 'The Purchase is done? you cant change it after you submit it'
            , icon: 'question'
            , showCancelButton: true
            , confirmButtonText: 'Save'
            , cancelButtonText: 'Cancel'
        , }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteURL; // Navigate to the specified route
            }
        });
    }

    $(document).ready(function() {
        $('.dataTable').DataTable({
            drawCallback: function(settings) {
                $(`[data-bs-toggle="tooltip"]`).tooltip({
                    container: 'body'
                })
            }
        });
    });

</script>
@endsection
