@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="card shadow p-4">

        <h4 class="mb-4">Edit Entry</h4>

        <form method="POST" action="{{ route('entries.update',$entry->id) }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-3">
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $entry->name }}"
                       required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ $entry->email }}"
                       required>
            </div>

            <!-- Amount -->
            <div class="mb-3">
                <input type="number"
                       name="amount"
                       class="form-control"
                       value="{{ $entry->amount }}"
                       required>
            </div>

            <!-- Staff -->
            <div class="mb-3">
                <select name="staff_id" class="form-select" required>

                    @foreach($staffs as $staff)
                        <option value="{{ $staff->id }}"
                            {{ $entry->staff_id == $staff->id ? 'selected' : '' }}>
                            {{ $staff->name }} ({{ $staff->email }})
                        </option>
                    @endforeach

                </select>
            </div>

            <button class="btn btn-success w-100">
                Update Entry
            </button>

        </form>

    </div>

</div>

@endsection