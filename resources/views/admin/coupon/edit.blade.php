@extends('dashboard.master')
@section('title', 'Edit Coupon')
@section('content')
<div class="pagetitle">
    <h1>Coupon</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Coupon</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="container">
        <div class="card">
            <div class="card-title m-2">
                <h4 class="fw-bold">Form Edit Coupon</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('coupon.update',$coupon->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="name" class="fw-bold">Nama Coupon</label>
                                <div class="has-validation">
                                    <input type="text" name="name" class="form-control" required value="{{ $coupon->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="kode" class="fw-bold">Kode</label>
                                <div class="has-validation">
                                    <input type="text" name="kode" class="form-control" value="{{ $coupon->kode }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="potongan" class="fw-bold">Potongan</label>
                                <div class="has-validation">
                                    <input type="int" name="potongan" class="form-control" required value="{{ $coupon->potongan }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="stock" class="fw-bold">Status</label>
                                <div class="has-validation">
                                    <select name="status" id="" class="form-control">
                                        <option @if ($coupon->status == 'aktif') selected @endif value="aktif">Aktif</option>
                                        <option @if ($coupon->status == 'tidak aktif') selected @endif value="tidak aktif">Tidak Aktif</option>
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