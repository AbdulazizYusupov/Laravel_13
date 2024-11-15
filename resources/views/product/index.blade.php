<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h1 style="text-align:center; color:#5D5C61;">Product</h1>

<div class="container">
    <div class="row mb-4">
        <div class="col-auto">
            <a href="{{ route('create') }}" class="btn btn-primary"
               style="background-color:#007BFF; border:none; color:white; padding:10px 20px; text-align:center; text-decoration:none; display:inline-block; font-size:16px; cursor:pointer; border-radius:8px;">Add
                Product</a>
        </div>
        <div class="col-auto ms-auto">
            <a href="{{ route('logout') }}" class="btn btn-secondary"
               style="background-color:#f44336; border:none; color:white; padding:10px 20px; text-align:center; text-decoration:none; display:inline-block; font-size:16px; cursor:pointer; border-radius:8px;">Logout</a>
        </div>
    </div>

    <table class="table table-hover table-bordered w-100 mx-auto" style="border-collapse:collapse;">
        <thead class="thead-dark" style="background-color:#379683; color:white;">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Price</th>
            <th class="text-center">Count</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td class="text-center">{{ $product->id }}</td>
                <td class="text-center">{{ Str::limit($product->name, 10) }}</td>
                <td class="text-center">${{ number_format($product->price, 2) }}</td>
                <td class="text-center">{{ $product->count }}</td>
                <td class="text-center">
                    <a href="{{ route('edit', $product->id) }}" class="btn btn-warning me-2">Update</a>
                    <form action="{{ route('destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination mt-3 text-center">
        {{ $products->links() }}
    </div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
