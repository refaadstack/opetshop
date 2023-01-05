@extends('dashboard.master')
@section('content')
    <div class="pagetitle">
        <h1>Product</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="container">
            <div class="card">
                <div class="card-title m-2">
                    <h4 class="fw-bold">Form Tambah Produk Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="name" class="fw-bold">Nama Produk</label>
                                    <div class="has-validation">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="thumbnail" class="fw-bold">Thumbnail</label>
                                    <div class="has-validation">
                                        <input type="file" name="thumbnail" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="caption" class="fw-bold">Caption</label>
                                    <div class="has-validation">
                                        <input type="text" name="caption" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="stock" class="fw-bold">Stock</label>
                                    <div class="has-validation">
                                        <input type="number" name="stock" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="price" class="fw-bold">Harga(Rp)</label>
                                    <div class="has-validation">
                                        <input type="number" name="price" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="weight" class="fw-bold">Berat(gr)</label>
                                    <div class="has-validation">
                                        <input type="number" name="weight" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <label for="category_id" class="fw-bold">Kategori</label>
                                    <div class="has-validation">
                                        <select name="category_id" id="" class="form-control" required>
                                            <option value="" selected disabled>Pilih Kategori</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}"> {{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection