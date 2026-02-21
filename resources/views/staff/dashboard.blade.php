@extends('layouts.app')

@section('content')

<h4 class="mb-4">My Assigned Entries</h4>

<div class="card shadow-sm">
    <div class="card-body table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Image</th>
                    <th width="200">Upload</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry->name }}</td>
                    <td>₹{{ $entry->amount }}</td>
                    <td>
                        @if($entry->image)
                            <img src="{{ asset('storage/'.$entry->image) }}" 
                                 class="img-fluid rounded" width="60">
                        @endif
                    </td>
                    <td>
                        <form action="{{ url('staff/upload/'.$entry->id) }}" 
                              method="POST" 
                              enctype="multipart/form-data">
                            @csrf
                            <input type="file" 
                                   name="image" 
                                   class="form-control form-control-sm mb-2">
                            <button class="btn btn-success btn-sm w-100">
                                Upload
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection