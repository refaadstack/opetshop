<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>Cart | OpetShop</title>
  </head>
  <body>
    <div class="container">
      <ol class="breadcrumb mt-5">
        <li class="breadcrumb-item"><a href="#">Cart</a></li>
        <li class="breadcrumb-item"><a href="#">Product</a></li>
        <li class="breadcrumb-item active">{{ Auth()->user()->name }}</li>
        <li class="breadcrumb-item d-block d-sm-none"><a href="/"> Back to shop </a></li>
        <li class="ml-auto breadcrumb-item d-none d-sm-block"><a href="/">Back to shop</a></li>
      </ol>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12">
          <div class="table-responsive table-responsive-sm">
            <table class="table table-light">
              <tr>
                <th>Nama Produk</th>
                <th>Foto</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
              @php
                  $total = 0;
                  $hitung = 0;
                  $result = 0;
                  $jumlahpajak =0;
                  $potongan = 0;
                  @endphp
                
            @forelse ($carts as $item)
            <tr>
                    <td>{{ $item->name }}</td>
                      <td><img src="{{ Storage::url($item->thumbnail) }}" alt="" style="width: 170px"></td>
                      <td>{{ $item->quantity }}</td>
                    <td>Rp. {{ number_format($item->price) }}</td>
                    <td>
                        <a href="{{ route('cart.delete',$item->id) }}" class="btn btn-sm btn-danger">delete</a>
                    </td>
                  </tr>
            <?php
                $total = $total + $item->price * $item->quantity;
                $hitung++;
                $bayar = $total;
                // $ongkir = 0;
                $pajak = 10/100;
                $result = $total
                // +($total*$pajak)
                ;
                // $jumlahpajak = $total*$pajak;
                
                // $format = number_format($result,2);
                // $bayar = $bayar;
                ?>
                  @empty
                  @endforelse
                </table>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12">
              <div class="card mt-2 mb-5">
                <div class="card-header">
                  <form action="{{ route('checkout') }}" method="post">
                    @csrf
                  <div class="form-group">
                    <label for="name">Biaya pengiriman</label>
                    <select name="ongkir" id="ongkir" class="form-control">
                      <option value="" selected disabled>Pilih pengiriman</option>
                      <option value="0">Ambil sendiri</option>
                      <option value="10000">Dalam kota(Jambi) - Rp. 10.000</option>
                      <option value="20000">Luar kota(Jambi) - Rp. 20.000</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="promo" class="fw-bold">Kode Promo</label>
                    <div class="input-group mb-3"> 
                      <div class="" hidden>
                          <label for="total_price"></label>
                          <input type="number" id="total_price" name="total_price" value="{{ $result }}" >
                      </div>
                      <input type="text" class="form-control" aria-label="Kode Promo" aria-describedby="basic-addon2" name="kode" id="kode" placeholder="Masukkan kode">
                      <span class="input-group-text" id="basic-addon2">
                          <button type="submit" class="btn" id="gunakan">Gunakan</button>
                      </span>
                    </div>
                  </div>
                  <h5>Total Pembayaran</h5>
                </div>
                <div class="card-body">
                  {{-- <p>PPN = 10% (Rp. {{ $jumlahpajak }})</p> --}}
                  <p>Total Harga = Rp. {{ $total }}</p>
                  <div class="form-group">
                    <label for="">Potongan</label>
                    <div class="input-group">
                      <span class="input-group-text text-danger" >Rp.</span>
                      <input type="text" class="form-control text-danger" aria-label="Kode Promo" aria-describedby="potongan" name="potongan" id="potongan" value="{{ number_format($potongan) }}">
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="result">Total setelah discount</label>
                      <div class="input-group">
                        <span class="input-group-text text-primary" >Rp.</span>
                        <input type="text" class="form-control text-primary" aria-describedby="result" name="result" id="result" value="{{ number_format($result) }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name">Nama Penerima</label>
                      <input type="text" name="user_id" class="form-control text-capitalize" value="{{ Auth::user()->id }}" hidden>
                      <input type="text" name="user_name" class="form-control text-capitalize" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                      <label for="name">Nomor HP</label>
                      <input type="text" name="phone" class="form-control text-capitalize">
                    </div>
                    <div class="form-group">
                      <label for="bayarmidtrans">Total yang harus dibayar</label>
                      <div class="input-group">
                        <span class="input-group-text text-primary" >Rp.</span>
                        <input type="text" class="form-control text-primary" aria-describedby="bayarmidtrans" name="bayarmidtrans" id="bayarMidtrans">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-block">Checkout</button>

                  </form>
                  {{-- <a href="" class="btn btn-info btn-block">Bayar Sekarang</a> --}}
                </div>
          </div>
        </div>
      </div>
    </div>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#gunakan').on('click', function(){
          $('#gunakan').prop('disabled',true)
          let kode = $('#kode').val();
          let total = $('#total_price').val();
          let token   = $("meta[name='csrf-token']").attr("content");
          let ongkir = $('#ongkir').val();

          console.log(ongkir);
          jQuery.ajax({
            url:'{{ route('apply.voucher') }}',
            type:"GET",
            data:{
              "kode": kode,
              "total":total,
              "_token": token,
              "ongkir":ongkir,
            },
            dataType:"json",
            success: function(response){
                $('#result').val(response[1]);
                $('#potongan').val(response[0]);
                $('#bayarMidtrans').val(response[2]);
              }
          })
        })
      })
    </script>
  </body>
</html>
