@extends('dashboard.master')
@section('title','Produk Index')
@section('content')
    <div class="pagetitle">
      <h1>Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section mb-5">
        <div class="card p-3">
         <div class="container">
          <h2>Product</h2>
          <a href="{{ route('product.create') }}" class="float-end btn btn-sm btn-primary mb-4">+Tambah</a>
          <table class="display nowrap table-striped table-bordered table" id="productTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Thumbnail</th>
                <th>Caption</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Berat</th>
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
              $('#productTable').dataTable({
              "responsive": true,
              ajax: {
                  url:'{{ route('product.index') }}'
              },
              columns:[
                { data:'DT_RowIndex', name:'DT_RowIndex'},
                { data:'name', name:'name'},
                { data:'thumbnail', name:'thumbnail'},
                { data:'caption', name:'caption'},
                { data:'price', name:'price'},
                { data:'stock', name:'stock'},
                { data:'weight', name:'weight'},
                { data:'action', name:'action'},
              ],
            } );
          new $.fn.dataTable.FixedHeader(' #productTable' );
          } );
        </script>
    @endsection
