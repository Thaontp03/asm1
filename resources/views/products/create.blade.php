<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm mới sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <h1>Thêm mới sản phẩm</h1>
    <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Url thumbnail</label>
                <input type="text" name="thumbnail" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="number" step="0.1" name="price" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category Name</label>
                <select name="category_id" class="form-control" id="">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Add New</button>
                <a href="{{ route('product.index') }}" class="btn btn-success">List</a>
            </div>
        </form>
    </div>
  </body>
</html>