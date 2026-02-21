@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="card shadow p-4">

        <h4 class="mb-4">Entry Details</h4>

        <p><strong>Name:</strong> {{ $entry->name }}</p>

        <p><strong>Email:</strong> {{ $entry->email }}</p>

        <p><strong>Amount:</strong> ₹{{ $entry->amount }}</p>

        <p><strong>Staff:</strong>
            {{ $entry->staff->name ?? 'Not Assigned' }}
        </p>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
            Back to Dashboard
        </a>

    </div>

</div>

@endsection