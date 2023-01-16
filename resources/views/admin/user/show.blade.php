@extends('dashboard.master')
@section('content')
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">{{ $user->name }}</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="container">
            <div class="card">
                <div class="card-title m-2">
                    <h4 class="fw-bold">Profil</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>{{ $user->role }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection