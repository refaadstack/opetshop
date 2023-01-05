@extends('dashboard.master')
@section('title','Kategori Index')
@section('content')
    <div class="pagetitle">
      <h1>Kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Kategori</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section mb-5">
        <div class="card p-3">
         <div class="container">
          <h2>Kategori</h2>
          <a href="{{ route('category.create') }}" class="float-end btn btn-sm btn-primary mb-4">+Tambah</a>
          <table class="display nowrap table-striped table-bordered table" id="categoryTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kategori</th>
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
              $('#categoryTable').dataTable({
              "responsive": true,
              ajax: {
                  url:'{{ route('category.index') }}'
              },
              columns:[
                { data:'DT_RowIndex', name:'DT_RowIndex'},
                { data:'name', name:'name'},
                { data:'action', name:'action'},
              ],
            } );
          new $.fn.dataTable.FixedHeader(' #categoryTable' );
          } );
        </script>
    @endsection
