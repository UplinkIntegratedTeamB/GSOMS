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
    <div class="row">
        <div class="col" >
            <div class="" style="margin-left: 18%; margin-top: 25%">
            <img  src="{{ asset('images/brand/logo.stacruz.png') }}" alt="" height="300" width="300">
            </div>
        </div>
        <div class="col shadow-lg p-5">
            <h4>Create Account</h4>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Department</label>
                    <select name="department_id" id="" class="select2 form-control">
                        <option value="" selected >Select Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group mt-2">
                    <label for="">Email Address </label>
                    <input type="text" class="form-control" name="email" placeholder="Email Address">
                </div>
                <div class="form-group mt-2">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group mt-2">
                    <label for="">Role</label>
                    <select name="role_id" id="" class="select2 form-control">
                        <option value="" selected >Select Role</option>
                        <option value="user">User</option>
                        <option value="staff">Staff</option>
                        <option value="headstaff">Head Staff</option>
                    </select>
                </div>
                <button class="btn btn-primary mt-3" style="float: right" type="submit">Create</button>
            </form>
        </div>
    </div>
</div>

@endsection
