<!DOCTYPE html>
<html>
<head>
    <title>QuickList - Listings</title>
</head>
<body>

    <h1>QuickList Listings</h1>

    @foreach ($listings as $listing)

        <div>

            @if ($listing->image)
                <img
                    src="{{ asset('storage/' . $listing->image) }}"
                    alt="{{ $listing->title }}"
                    width="300"
                >
            @endif

            <h2>{{ $listing->title }}</h2>

            <p>{{ $listing->description }}</p>

            <p>Price: {{ $listing->price }}</p>

            <p>Category: {{ $listing->category }}</p>

            <p>Condition: {{ $listing->condition }}</p>

            <p>Posted by: {{ $listing->user->name }}</p>

            <a href="{{ route('listings.show', $listing->id) }}">
                View Details
            </a>

        </div>

        <hr>

    @endforeach

</body>
</html>