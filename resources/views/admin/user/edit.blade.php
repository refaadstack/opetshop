@extends('dashboard.master')
@section('title', 'Edit User')
@section('content')
<div class="pagetitle">
    <h1>User</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="container">
        <div class="card">
            <div class="card-title m-2">
                <h4 class="fw-bold">Form Edit User</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="name" class="fw-bold">Nama User</label>
                                <div class="has-validation">
                                    <input type="text" name="name" class="form-control" required value="{{ $user->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="role" class="fw-bold">Role</label>
                                <div class="has-validation">
                                    <select name="role" id="" class="form-control" required>
                                        <option value="" selected disabled>Pilih Role</option>
                                        <option value="admin" @if($user->role == 'admin') selected @endif>admin</option>
                                        <option value="customer" @if($user->role == 'customer') selected @endif>customer</option>
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