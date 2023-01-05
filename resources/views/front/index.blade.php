<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="cheap and reliable pet food seller, as well as quality" />
    <meta name="theme-color" content="#5bc0de" />
    <!-- my css -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <!-- owl carousel? -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />

    <!-- fontAwesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="apple-touch-icon" href="favicon.ico" type="image/x-icon" />

    <title>OpetShop</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.html">
        <img src="/img/logo.png" alt="" width="100px" height="50px" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- left nav -->
        <ul class="navbar-nav ml-0">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#produk">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
        <!-- end left nav -->
        <!-- right nav -->
        <ul class="navbar-nav" style="margin-left: auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('cart') }}">
              <i class="fa-solid fa-cart-shopping"></i>
            </a>
          </li>
          @if (Route::has('login'))
              @auth
                <li class="nav-item">
                  <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
              @endauth
          @endif
        </ul>
        <!-- end right nav -->
      </div>
    </nav>
    <!-- end nav -->
    <!-- jumbotron -->
    <div class="jumbotron bg-info rounded-0 mb-0">
      <div class="container text-light">
        <h1>Opetshop</h1>
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <p>
              "Selamat Datang di PetShop Opet! Temukan Berbagai Pilihan keperluan Hewan Peliharaan Terbaik Hanya di Sini"
            </p>
          </div>
          <div class="col-md-4 col-sm-12">
            <img class="" src="img/cat-1.png" style="width: 300px" alt="OpetShop Cat" />
          </div>
        </div>
      </div>
    </div>
    <!-- end jumbotron -->
    {{-- banner --}}
          @if($banner)
              <div class="jumbotron {{ $banner->warna }} rounded-0 mt-0">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <img src="{{ Storage::url($banner->gambar) }}" style="width:300px; margin-right:200px" alt="">
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <h5 class="text-light">{{ $banner->text }}</h5>
                      </div>
                    </div>
                  </div>
              </div>
          @else
            
          @endif
    {{-- end banner --}}
    <!-- Produk -->
    <section id="produk" class="container mb-5">
      <div class="product">
        <h3 class="text-center mb-2">Best Product</h3>
        <p class="text-center">Best Seller and Top Seller</p>
      </div>
      <div class="owl-carousel">
        @foreach ($products as $item )
          <div class="card mr-2">
            <div class="card-img-top">
              <img src="{{ Storage::url($item->thumbnail) }}" alt="Produk Opetshop" width="200px" height="200px" />
            </div>
            <div class="card-body">
              <h5>{{ $item->name }}</h5>
              <p>{{ $item->caption }}</p>
              <p>Rp. {{ number_format($item->price) }}</p>
              <form action="{{ route('cart-add',$item->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary">Add To Cart</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
      <a class="mr-auto font-weight-bold" href="#">LOAD MORE>></a>
    </section>
    <!-- end Produk -->

    <section id="about" class="container mb-5">
      <h4 class="text-center">About</h4>
      <p class="text-center">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi velit excepturi soluta libero quibusdam atque ratione hic nam temporibus necessitatibus minima aliquid enim fuga ad asperiores obcaecati pariatur doloribus architecto
        nostrum impedit, consectetur neque quia? Illum quos, quae optio exercitationem aperiam beatae molestiae deserunt necessitatibus. Aut molestiae nulla voluptatem inventore vero earum odio, sit nostrum incidunt repellendus ab
        asperiores perspiciatis dolorem molestias, unde labore? At sunt recusandae ullam doloremque cupiditate. Iusto natus assumenda dicta voluptas? Perferendis dolor obcaecati exercitationem. Voluptatem repellat eos esse maxime, non
        quasi, officia ratione ipsam sequi enim aliquam corrupti earum sapiente voluptatum quaerat, perferendis quibusdam voluptate!
      </p>
    </section>

    <footer id="footer" class="bg-info text-light">
      <div class="container">
        <div class="row pt-5">
          <div class="col-lg-4 col-12">
            <div class="d-flex justify-content-center">
              <img src="/img/logo.png" alt="Opetshop" width="150px" />
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <h5 class="text-center" id="contact">Contact</h5>
            <ul class="text-left">
              <li class="list-group">
                <a href="http://wa.me/6282374338273" class="text-decoration-none text-light"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
              </li>
              <li class="list-group">
                <a href="http://Instagram.com" class="text-decoration-none text-light"><i class="fa-brands fa-instagram"></i> Instagram</a>
              </li>
              <li class="list-group">
                <a href="http://tiktok.com" class="text-decoration-none text-light"><i class="fa-brands fa-tiktok"></i>Tiktok</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-4 col-12">
            <p class="text-center">Powered By &copy; Refaad</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- carousel -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
    <script src="js/carousel.js" type="text/javascript"></script>
  </body>
</html>
