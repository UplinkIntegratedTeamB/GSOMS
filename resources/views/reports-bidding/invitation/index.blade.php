@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h4>Invitation of Bids</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Good No.</th>
                        <th>Post Start</th>
                        <th>Post Until</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invitations as $invitation)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>STC-GOOD-No. {{ $invitation->good }}</td>
                            <td>{{ date('F, j, Y', strtotime($invitation->start)) }}</td>
                            <td>{{ date('F, j, Y', strtotime($invitation->until)) }}</td>
                            <td>
                            <div class="">
                                    <a href="{{ route('pdf.iob', ['id' => $invitation->requestDetail->id]) }}" class="btn btn-primary"><i class="fas fa-file-pdf"></i></a>
                                    @if($invitation->requestDetail->status == 6)
                                    <a href="{{ route('invitation-bid.edit', $invitation->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('invitation-bid.destroy', $invitation->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('#dataTable').DataTable();
    </script>
</div>

@endsection
