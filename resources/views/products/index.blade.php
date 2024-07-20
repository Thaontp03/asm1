<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Danh sách Sản phẩm</h1>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Title</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Category Name</th>
            <th>
                <a href="{{ route('product.create') }}" class="btn btn-success">Create New</a>
            </th>
        </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->title }}</td>
            <td><img src="{{ $product->thumbnail }}" width="60" alt=""></td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->name }}</td>
            <td>
              <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success">Sửa</a>
              <form action="{{ route('product.destroy', $product->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" 
                onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
              </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{ $products->links() }}
  </body>
</html>