@extends('dashboard.master')
@section('content')
    <div class="pagetitle">
        <h1>Coupon</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Coupon</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="container">
            <div class="card">
                <div class="card-title m-2">
                    <h4 class="fw-bold">Form Tambah Coupon Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('coupon.store')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="name" class="fw-bold">Nama Coupon</label>
                                    <div class="has-validation">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="kode" class="fw-bold">Kode</label>
                                    <div class="has-validation">
                                        <input type="text" name="kode" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="potongan" class="fw-bold">Potongan</label>
                                    <div class="has-validation">
                                        <input type="number" name="potongan" class="form-control" required >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-2">
                                <div class="form-group">
                                    <label for="stock" class="fw-bold">Status</label>
                                    <div class="has-validation">
                                        <select name="status" id="" class="form-control">
                                            <option value="aktif">Aktif</option>
                                            <option value="tidak aktif">Tidak Aktif</option>
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