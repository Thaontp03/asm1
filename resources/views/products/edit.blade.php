<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <h1>Cập nhật sản phẩm</h1>
    <form action="{{ route('product.update', $product->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $product->id }}">
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $product->title }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Url thumbnail</label>
                <input type="text" name="thumbnail" class="form-control" value="{{ $product->thumbnail }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" value="{{ $product->description }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="number" step="0.1" name="price" class="form-control" value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category Name</label>
                <select name="category_id" class="form-control" id="">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}"
                        @if ($cate->id === $product->category_id) selected @endif>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Cập nhật</button>
                <a href="{{ route('product.index') }}" class="btn btn-success">List</a>
            </div>
        </form>
    </div>
  </body>
</html>