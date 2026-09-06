<!DOCTYPE html>
<html>
<head>
    <title>Edit Listing - QuickList</title>
</head>
<body>

    <h1>Edit Listing</h1>

    @if ($errors->any())
        <div>
            <h3>Please fix the following errors:</h3>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('listings.update', $listing->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <div>
            <label>Title:</label>

            <input
                type="text"
                name="title"
                value="{{ old('title', $listing->title) }}"
            >
        </div>

        <br>

        <div>
            <label>Description:</label>

            <textarea name="description">{{ old('description', $listing->description) }}</textarea>
        </div>

        <br>

        <div>
            <label>Price:</label>

            <input
                type="number"
                name="price"
                step="0.01"
                value="{{ old('price', $listing->price) }}"
            >
        </div>

        <br>

        <div>
            <label>Category:</label>

            <select name="category">

                <option value="Electronics"
                    {{ $listing->category == 'Electronics' ? 'selected' : '' }}>
                    Electronics
                </option>

                <option value="Furniture"
                    {{ $listing->category == 'Furniture' ? 'selected' : '' }}>
                    Furniture
                </option>

                <option value="Clothes"
                    {{ $listing->category == 'Clothes' ? 'selected' : '' }}>
                    Clothes
                </option>

                <option value="Books"
                    {{ $listing->category == 'Books' ? 'selected' : '' }}>
                    Books
                </option>

                <option value="Other"
                    {{ $listing->category == 'Other' ? 'selected' : '' }}>
                    Other
                </option>

            </select>
        </div>

        <br>

        <div>
            <label>Condition:</label>

            <select name="condition">

                <option value="New"
                    {{ $listing->condition == 'New' ? 'selected' : '' }}>
                    New
                </option>

                <option value="Used"
                    {{ $listing->condition == 'Used' ? 'selected' : '' }}>
                    Used
                </option>

            </select>
        </div>

        <br>

        <div>
            <label>Seller Phone:</label>

            <input
                type="text"
                name="seller_phone"
                value="{{ old('seller_phone', $listing->seller_phone) }}"
            >
        </div>

        <br>

        @if ($listing->image)

            <p>Current Image:</p>

            <img
                src="{{ asset('storage/' . $listing->image) }}"
                width="250"
            >

            <br><br>

        @endif

        <div>
            <label>New Image:</label>
            <input type="file" name="image">
        </div>

        <br>

        <button type="submit">
            Update Listing
        </button>

    </form>

    <br>

    <a href="{{ route('listings.show', $listing->id) }}">
        Cancel
    </a>

</body>
</html>