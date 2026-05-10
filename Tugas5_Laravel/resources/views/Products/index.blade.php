<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk & Variant</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color:white;
            padding-top:40px;
        }

        .table-container{
            width:700px;
            margin:auto;
        }

        .btn-tambah{
            float:right;
            margin-bottom:10px;
        }

        table{
            font-size:14px;
        }

        th{
            text-align:center;
            background:#f8f9fa;
        }

        td{
            vertical-align:top;
        }

        .product-name{
            font-weight:bold;
            font-size:14px;
        }

        .variant-list{
            margin-top:5px;
            padding-left:18px;
            font-size:12px;
        }

        .variant-list li{
            margin-bottom:8px;
        }

        .form-box{
            width:350px;
            margin:auto;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="table-container">

        <!-- tombol tambah -->
        <a href="{{ route('products.create') }}"
           class="btn btn-primary btn-sm btn-tambah">

            Tambah

        </a>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Nama</th>
                    <th width="180">Harga</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($products as $p)

                <tr>

                    <!-- nama + variant -->
                    <td>

                        <span class="product-name">
                            {{ $p->name }}
                        </span>

                        @if($p->variants->count() > 0)

                            <ul class="variant-list text-muted">

                                @foreach($p->variants as $v)

                                <li>

                                    <b>{{ $v->name }}</b><br>

                                    Desc: {{ $v->description }} <br>

                                    Proc: {{ $v->processor }} <br>

                                    RAM: {{ $v->memory }} <br>

                                    Storage: {{ $v->storage }}

                                </li>

                                @endforeach

                            </ul>

                        @else

                            <small class="text-muted">
                                Belum ada varian
                            </small>

                        @endif

                    </td>

                    <!-- harga -->
                    <td class="text-center">

                        {{ number_format($p->price,0,'.','.') }}

                    </td>

                    <!-- tombol -->
                    <td class="text-center">

                        <a href="{{ route('products.edit',$p->id) }}"
                           class="btn btn-primary btn-sm">

                           Edit

                        </a>

                        <form action="{{ route('products.destroy',$p->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="3"
                        class="text-center text-muted">

                        Data masih kosong

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>