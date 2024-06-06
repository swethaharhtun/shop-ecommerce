<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    body{
        padding:100px;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h5>Edit Product</h5>
                <form action="{{ url('products/'.$product->id) }}" method="POST">
                    {{csrf_field()}} @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter Product Title" value="{{ $product -> title ?? old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Enter Product Price" value="{{ $product -> price ?? old('price') }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="currency">Currency</label>
                        <select class="form-control" id="currency" name="currency">
                            <option value="USD" {{ ($product && $product->currency == 'USD') || old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                            <option value="EUR" {{ ($product && $product->currency == 'EUR') || old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                            <option value="GBP" {{ ($product && $product->currency == 'GBP') || old('currency') == 'GBP' ? 'selected' : '' }}>GBP</option>
                        </select>
                        @error('currency')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stock">Product Stock</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" id="stock" placeholder="Enter Product Stock" value="{{ $product -> stock ?? old('stock') }}">
                        @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Product Detail</label>
                        <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Enter Product Detail">{{ $product -> content ?? old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="warranty">Warranty</label>
                        <input type="text" class="form-control @error('warranty') is-invalid @enderror" name="warranty" id="warranty" placeholder="Enter Product Warranty" value="{{ $product -> warranty ?? old('warranty') }}">
                        @error('warranty')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="promotion">Promotion</label>
                        <input type="number" class="form-control @error('promotion') is-invalid @enderror" name="promotion" id="promotion" placeholder="Enter Product Promotion" value="{{ $product -> promotion ?? old('promotion') }}">
                        @error('promotion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>