@extends('dashboard.master')
@section('title','MY TRANSACTION')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Transaksi Saya</h5>
            </div>
            <div class="card-body mt-3">
                <table class="table table-bordered">
                    <tr>
                        <td>Nama</td>
                        <td>{{ $transaction->name}}</td>
                    </tr>
                    <tr>
                        <td>Total Belanja</td>
                        <td>{{ $transaction->total_price }}</td>
                    </tr>
                    <tr>
                        <td>Ongkir</td>
                        <td>{{ $transaction->ongkir }}</td>
                    </tr>
                    <tr>
                        <td>Payment Link</td>
                        <td><a href="{{ $transaction->payment_url }}">link pembayaran</a></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $transaction->status }}</td>
                    </tr>
                </table>
            </div>

            <div class="card">
                <div class="card-header">
                    Item Belanja
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>No</td>
                            <td>Nama Barang</td>
                            <td>Total harga</td>
                        </tr>
                        @foreach ($transactionItem as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->total_price }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection