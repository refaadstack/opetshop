@extends('dashboard.master')
@section('content')
    <div class="pagetitle">
        <h1>Banner</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Banner</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="container">
            <div class="card">
                <div class="card-title m-2">
                    <h4 class="fw-bold">Form Tambah Banner Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="name" class="fw-bold">Warna Background</label>
                                    <div class="has-validation">
                                        <select name="warna" id="" class="form-control">
                                            <option value="" selected disabled>---Pilih warna---</option>
                                            <option value="bg-primary">Biru Tua</option>
                                            <option value="bg-danger">Merah</option>
                                            <option value="bg-info">Biru Muda</option>
                                            <option value="bg-success">Hijau</option>
                                            <option value="bg-warning">Kuning</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="name" class="fw-bold">Text Banner</label>
                                    <div class="has-validation">
                                        <textarea class="form-control" name="text" id="" cols="10" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <label for="" class="fw-bold">Gambar Banner</label>
                                    <div class="has-validation">
                                        <input name="gambar" type="file" class="form-control">
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