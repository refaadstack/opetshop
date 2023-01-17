@extends('dashboard.master')
@section('title')
@section('content')
    <div class="pagetitle">

    </div>
    <section class="section">
        <div class="container">
            <h5>Filter Laporan</h5>
            <form action="{{ route('laporan.transaksi') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="from">Dari Tanggal</label>
                            <input type="date" name="from" id="" class="form-control m-2">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="to">Hingga Tanggal</label>
                            <input type="date" name="to" id="" class="form-control m-2">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Cetak</button>
            </form>
        </div>
    </section>
@endsection