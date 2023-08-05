@extends('layouts.app')

@section('content')
<div class="main py-4">
    <div class="row">
        <div class="col-4 col-xl-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h6 class="fw-bold mb-1 card-title">{{ __('Purchase Request on pending') }}</h6>
                    @user
                    <p>{{ $pr }} PR pending</p>
                    @enduser
                    @staff
                    <p>{{ $requests }} PR pending</p>
                    @endstaff
                    <a class="card-link" style="color: blue; text-decoration: underline" href="{{ route('purchase-request.show', auth()->id()) }}">See Status</a>
                </div>
            </div>
        </div>
        <div class="col-4 col-xl-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h6 class="fw-bold mb-1 card-title">{{ __('Completed Purchase Request') }}</h6>
                    @user
                    <p>{{ $pr_complete }} Completed PR </p>
                    @enduser
                    @staff
                    <p>{{ $requestComplete }} Completed PR </p>
                    @endstaff
                    <a class="card-link" style="color: blue; text-decoration: underline" href="{{ route('purchase-request.show', auth()->id()) }}">See Status</a>
                </div>
            </div>
        </div>
        <div class="col-4 col-xl-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h6 class="fw-bold mb-1 card-title">{{ __('Overall Remaining Balance') }}</h6>
                    <p> <strong>P 100,000.00</strong></p>
                    <a class="card-link" style="color: blue; text-decoration: underline" href="{{ route('purchase-request.show', auth()->id()) }}">See Balance</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid card mt-5">
        <div class="card-header">
            <h5>Completed Purchase Requests</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>Purchase Request No.</th>
                            <th>Department</th>
                            <th>Division</th>
                            <th>Section</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prs as $pr)
                            <tr>
                                <td>{{ $pr->pr_no }}</td>
                                <td>{{ $pr->department->name }}</td>
                                <td>{{ $pr->division?->name }}</td>
                                <td>{{ $pr->section?->name }}</td>
                                <td>{{ $pr->created_at }}</td>
                                <td>
                                    <a class="col btn btn-primary" href="{{ url("purchase-request/view/$pr->id") }}"><i class="fas fa-eye"></i></a>
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
</div>
@endsection
