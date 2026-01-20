@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Search Results for: "{{ $query }}"</h2>

        @if($results->isEmpty())
            <p>No beaches found.</p>
        @else
            <ul class="list-group mt-3">
                @foreach($results as $beach)
                    <li class="list-group-item">
                        <h5>{{ $beach->name }}</h5>
                        <p>{{ $beach->description }}</p>
                        <a href="{{ route('beaches.show', $beach->id) }}">View Details</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
