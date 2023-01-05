@extends('dashboard.master')
@section('title','Coupon Index')
@section('content')
    <div class="pagetitle">
      <h1>Coupon</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Coupon</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section mb-5">
        <div class="card p-3">
         <div class="container">
          <h2>Coupon</h2>
          <a href="{{ route('coupon.create') }}" class="float-end btn btn-sm btn-primary mb-4">+Tambah</a>
          <table class="display nowrap table-striped table-bordered table" id="couponTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Coupon</th>
                <th>Kode</th>
                <th>Potongan</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($products as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->thumbnail }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                      <a href="#" class="btn btn-warning btn-small">monyet</a>
                      <a href="#" class="btn btn-danger btn-small">anjing</a>
                    </td>
                  </tr>
              @endforeach --}}
            </tbody>
          </table>
        </div>
        </div>
    </section>


    
    @endsection
    @section('script')

        <script>


          $(document).ready(function() {
              $('#couponTable').dataTable({
              "responsive": true,
              ajax: {
                  url:'{{ route('coupon.index') }}'
              },
              columns:[
                { data:'DT_RowIndex', name:'DT_RowIndex'},
                { data:'name', name:'name'},
                { data:'kode', name:'kode'},
                { data:'potongan', name:'potongan'},
                { data:'status', name:'status'},
                { data:'action', name:'action'},
              ],
            } );
          new $.fn.dataTable.FixedHeader(' #couponTable' );
          } );
        </script>
    @endsection
