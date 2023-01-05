@extends('dashboard.master')
@section('title','Transaction Index')
@section('content')
    <div class="pagetitle">
      <h1>Transaksi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Transaksi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section mb-5">
        <div class="card p-3">
         <div class="container">
          <h2>Transaksi</h2>
          <table class="display nowrap table-striped table-bordered table" id="transactionTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Total Belanja</th>
                <th>link Pembayaran</th>
                <th>Status</th>
                <th>TA/kirim</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($products as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->total_price }}</td>
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
              $('#transactionTable').dataTable({
              "responsive": true,
              ajax: {
                  url:'{{ route('my-transaction') }}'
              },
              columns:[
                { data:'DT_RowIndex', name:'DT_RowIndex'},
                { data:'name', name:'name'},
                { data:'total_price', name:'total_price'},
                { data:'payment_url', name:'payment_url'},
                { data:'status', name:'status'},
                { data:'ongkir', name:'ongkir'},
                { data:'action', name:'action'},
              ],
            } );
          new $.fn.dataTable.FixedHeader('#transactionTable' );
          } );
        </script>
    @endsection
