<!DOCTYPE html>
<html>
<head>
    <title>{{ $user->name }} - Profile</title>
</head>
<body>

    <h1>{{ $user->name }}'s Profile</h1>

    <p>Email: {{ $user->email }}</p>

    <h2>Listings by {{ $user->name }}</h2>

    @forelse ($user->listings as $listing)

        <div>

            @if ($listing->image)
                <img
                    src="{{ asset('storage/' . $listing->image) }}"
                    alt="{{ $listing->title }}"
                    width="250"
                >
            @endif

            <h3>{{ $listing->title }}</h3>

            <p>{{ $listing->description }}</p>

            <p>Price: {{ $listing->price }}</p>

            <p>Category: {{ $listing->category }}</p>

            <a href="{{ route('listings.show', $listing->id) }}">
                View Details
            </a>

        </div>

        <hr>

    @empty

        <p>This user has no listings yet.</p>

    @endforelse

    <br>

    <a href="{{ route('listings.index') }}">
        Back to Listings
    </a>

</body>
</html>