<!DOCTYPE html>
<html>
<head>
    <title>Create Listing - QuickList</title>
</head>
<body>

    <h1>Create New Listing</h1>

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

    <form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title') }}">
        </div>

        <br>

        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <br>

        <div>
            <label>Price:</label>
            <input type="number" name="price" step="0.01" value="{{ old('price') }}">
        </div>

        <br>

        <div>
            <label>Category:</label>

            <select name="category">
                <option value="">Select Category</option>
                <option value="Electronics">Electronics</option>
                <option value="Furniture">Furniture</option>
                <option value="Clothes">Clothes</option>
                <option value="Books">Books</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <br>

        <div>
            <label>Condition:</label>

            <select name="condition">
                <option value="">Select Condition</option>
                <option value="New">New</option>
                <option value="Used">Used</option>
            </select>
        </div>

        <br>

        <div>
            <label>Seller Phone:</label>
            <input type="text" name="seller_phone" value="{{ old('seller_phone') }}">
        </div>

        <br>

        <div>
            <label>Image:</label>
            <input type="file" name="image">
        </div>

        <br>

        <button type="submit">Create Listing</button>

    </form>

    <br>

    <a href="{{ route('listings.index') }}">Back to Listings</a>

</body>
</html>