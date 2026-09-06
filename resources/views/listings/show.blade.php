<!DOCTYPE html>
<html>
<head>
    <title>{{ $listing->title }} - QuickList</title>
</head>

<body>

    <h1>{{ $listing->title }}</h1>

    @if ($listing->image)
        <img
            src="{{ asset('storage/' . $listing->image) }}"
            alt="{{ $listing->title }}"
            width="400"
        >
    @endif

    <h2>{{ $listing->title }}</h2>

    <p>
        <strong>Description:</strong>
        {{ $listing->description }}
    </p>

    <p>
        <strong>Price:</strong>
        {{ $listing->price }}
    </p>

    <p>
        <strong>Category:</strong>
        {{ $listing->category }}
    </p>

    <p>
        <strong>Condition:</strong>
        {{ $listing->condition }}
    </p>

    <p>
        <strong>Seller Phone:</strong>
        {{ $listing->seller_phone }}
    </p>

    <p>
        <strong>Posted by:</strong>

        <a href="{{ route('profile.show', $listing->user->id) }}">
            {{ $listing->user->name }}
        </a>
    </p>

    <p>
        Posted:
        {{ $listing->created_at->diffForHumans() }}
    </p>

    <hr>

    <!-- Edit Listing -->
    <a href="{{ route('listings.edit', $listing->id) }}">
        Edit Listing
    </a>

    <br><br>

    <!-- Delete Listing -->
    <form
        action="{{ route('listings.destroy', $listing->id) }}"
        method="POST"
    >
        @csrf
        @method('DELETE')

        <button type="submit">
            Delete Listing
        </button>
    </form>

    <br>

    <!-- Back to Listings -->
    <a href="{{ route('listings.index') }}">
        Back to Listings
    </a>

</body>
</html>