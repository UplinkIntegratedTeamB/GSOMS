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
        {{-- <div class="col-4 col-xl-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h6 class="fw-bold mb-1 card-title">{{ __('Completed Purchase Request') }}</h6>
                    <p>{{ $pr }} PR pending</p>
                    <a class="card-link" style="color: blue; text-decoration: underline" href="{{ route('purchase-request.show', auth()->id()) }}">See Status</a>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
