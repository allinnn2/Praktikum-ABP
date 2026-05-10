<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form {{ $title }} Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: white;
            padding-top: 80px;
        }

        .form-container {
            width: 35%;
            margin: auto;
        }

        label {
            font-size: 14px;
        }

        input {
            font-size: 14px;
        }

        h4 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="form-container">

    <h4>Form {{ $title }} Produk</h4>

    <form method="POST" action="{{ $route }}" class="border p-3">
        @csrf

        @if($method === 'PUT')
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $product->name) }}">

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price"
                class="form-control @error('price') is-invalid @enderror"
                value="{{ old('price', $product->price) }}">

            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-center">
            <button class="btn btn-success btn-sm">Simpan</button>
        </div>

    </form>

</div>

</body>
</html>