@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow p-4">

                <h4 class="mb-4">Create Entry</h4>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Validation Errors -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('entries.store') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control"
                               placeholder="Name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control"
                               placeholder="Email" required>
                    </div>

                    <!-- Amount -->
                    <div class="mb-3">
                        <input type="number" name="amount" class="form-control"
                               placeholder="Amount" required>
                    </div>

                    <!-- Staff Selection ⭐ -->
                    <div class="mb-3">
                        <select name="staff_id" class="form-select" required>
                            <option value="">Select Staff</option>

                            @foreach($staffs as $staff)
                                <option value="{{ $staff->id }}">
                                    {{ $staff->name }} ({{ $staff->email }})
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <button class="btn btn-primary w-100">
                        Save Entry
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>

@endsection