@extends('dashboard.master')
@section('content')
    <div class="container " style="margin-bottom: 100px">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-primary rounded-sm m-2 text-white">
                        <h5 class="text-center mt-2">Jumlah Produk</h5>
                        <p class="text-center">{{ $product }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success rounded-sm m-2 text-white">
                    <h5 class="text-center mt-2">Jumlah Transaksi</h5>
                    <p class="text-center">{{ $transaksi }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-danger rounded-sm m-2 text-white">
                    <h5 class="text-center mt-2">Jumlah Coupon</h5>
                    <p class="text-center">{{ $coupon }}</p>
                </div>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-body mt-5">
                <h5 class="text-center">
                    Selamat Datang di Dashboard Opetshop
                </h5>
                <p>
                    "Selamat datang di dashboard Opet Pet Shop! Ini adalah tempat Anda mengelola semua kebutuhan toko hewan peliharaan Anda. Mulai dari menambahkan produk baru hingga mengatur pesanan pelanggan, semuanya dapat dilakukan di sini dengan mudah. Terima kasih telah memilih Opet Pet Shop untuk kebutuhan hewan peliharaan Anda."
                </p>
            </div>
        </div>
    </div>
@endsection