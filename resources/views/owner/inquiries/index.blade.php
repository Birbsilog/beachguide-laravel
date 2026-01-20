{{-- resources/views/beach_owner/inquiries/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Beach Inquiries</h2>

    @if($inquiries->isEmpty())
        <div class="alert alert-info">
            No inquiries yet.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Beach</th>
                    <th>From</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Received At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inquiries as $inquiry)
                    <tr>
                        <td>{{ $inquiry->beach->name ?? 'N/A' }}</td>
                        <td>{{ $inquiry->user->name ?? 'Guest' }}</td>
                        <td>{{ $inquiry->subject }}</td>
                        <td>{{ $inquiry->message }}</td>
                        <td>
                            @if($inquiry->status === 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($inquiry->status === 'answered')
                                <span class="badge bg-success">Answered</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($inquiry->status) }}</span>
                            @endif
                        </td>
                        <td>{{ $inquiry->created_at->format('M d, Y h:i A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
