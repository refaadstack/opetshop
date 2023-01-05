@extends('dashboard.master')
@section('title', 'Edit Transaksi')
@section('content')
<div class="pagetitle">
    <h1>Product</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Transaksi</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="container">
        <div class="card">
            <div class="card-title m-2">
                <h4 class="fw-bold">Form Edit Transaksi</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('transaction.update',$transaction->id) }}" method="POST"  class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="name" class="fw-bold">Transaksi dari pelanggan : {{ $transaction->name }}</label>
                                <div class="has-validation">
                                    <select class="form-control" name="status" id="">
                                        <option value="SUKSES" @if($transaction->status=='SUKSES') selected @endif> ---SUKSES---</option>
                                        <option value="CANCEL" @if($transaction->status=='CANCEL') selected @endif > ---CANCEL---</option>
                                        <option value="EXPIRED" @if($transaction->status=='EXPIRED') selected @endif > ---EXPIRED---</option>
                                        <option value="PENDING" @if($transaction->status=='PENDING') selected @endif > ---PENDING---</option>
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