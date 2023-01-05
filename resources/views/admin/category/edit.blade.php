@extends('dashboard.master')
@section('title', 'Edit Kategori')
@section('content')
<div class="pagetitle">
    <h1>Kategori</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Kategori</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="container">
        <div class="card">
            <div class="card-title m-2">
                <h4 class="fw-bold">Form Edit Kategori</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="name" class="fw-bold">Nama Kategori</label>
                                <div class="has-validation">
                                    <input type="text" name="name" class="form-control" required value="{{ $category->name }}">
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