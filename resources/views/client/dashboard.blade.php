@extends('layouts.app')

@section('content')

<h4 class="mb-4">All Entries (Read Only)</h4>

<div class="card shadow-sm">
    <div class="card-body table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Staff</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry->name }}</td>
                    <td>₹{{ $entry->amount }}</td>
                    <td>{{ $entry->staff->name ?? '' }}</td>
                    <td>
                        @if($entry->image)
                            <img src="{{ asset('storage/'.$entry->image) }}" 
                                 class="img-fluid rounded" width="60">
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection