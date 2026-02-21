@extends('layouts.app')

@section('content')

<div class="container mt-4">

  

    <!-- Dashboard Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Admin Dashboard</h4>

        <a href="{{ route('entries.create') }}" class="btn btn-primary">
            + Create Entry
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3">
                <h6>Total Entries</h6>
                <h3 class="fw-bold">{{ $total ?? 0 }}</h3>
            </div>
        </div>

    </div>

    <!-- Entries Table -->
    <div class="card shadow-sm">

        <div class="card-header bg-dark text-white">
            Entries List
        </div>

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Staff</th>
                        <th>Image</th>
                        <th width="160">Action</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($entries as $entry)

                    <tr>
                        <td>{{ $entry->name }}</td>
                        <td>{{ $entry->email }}</td>
                        <td>₹{{ $entry->amount }}</td>

                        <td>
                            {{ $entry->staff->name ?? 'Not Assigned' }}
                        </td>

                        <td>
                            @if($entry->image)
                                <img src="{{ asset('storage/'.$entry->image) }}"
                                     width="50"
                                     class="rounded">
                            @endif
                        </td>

                        <td>
                            <div class="d-flex gap-2">

                                <a href="{{ route('entries.edit',$entry->id) }}"
                                   class="btn btn-warning btn-sm">
                                   Edit
                                </a>

                                <a href="{{ route('entries.show',$entry->id) }}"
                                   class="btn btn-info btn-sm">
                                   View
                                </a>

                                <form action="{{ route('entries.destroy',$entry->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete entry?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Delete
                                    </button>

                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            No entries found
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection