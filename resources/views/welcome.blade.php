<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="author" content="Grayrids">
  <title>BaApik - Aplikasi Puskesmas</title>
  <!--====== Favicon Icon ======-->
  <link rel="shortcut icon" href="/baapik/img/2.png" type="image/png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/baapik/css/bootstrap.min.css">
  <link rel="stylesheet" href="/baapik/css/animate.css">
  <link rel="stylesheet" href="/baapik/css/LineIcons.css">
  <link rel="stylesheet" href="/baapik/css/owl.carousel.css">
  <link rel="stylesheet" href="/baapik/css/owl.theme.css">
  <link rel="stylesheet" href="/baapik/css/magnific-popup.css">
  <link rel="stylesheet" href="/baapik/css/nivo-lightbox.css">
  <link rel="stylesheet" href="/baapik/css/main.css">
  <link rel="stylesheet" href="/baapik/css/responsive.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="https://bapintar.banjarmasinkota.go.id/vendor/bjm-sso/bjm-sso.css">
  <script src="https://bapintar.banjarmasinkota.go.id/vendor/bjm-sso/bjm-sso.js"></script>
  {{--
  <link rel="stylesheet" type="text/css" href="http://server.banjarmasinkota.go.id:8000/vendor/bjm-sso/bjm-sso.css">
  <script src="http://server.banjarmasinkota.go.id:8000/vendor/bjm-sso/bjm-sso.js"></script> --}}

</head>

<body>

  <!-- Header Section Start -->
  <header id="home" class="hero-area">
    <div class="overlay">
      <span></span>
      <span></span>
    </div>
    <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
      <div class="container">
        <a href="index.html" class="navbar-brand"><img src="/baapik/img/Baapik2.png" alt="" width="168px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <i class="lni-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#blog">Puskesmas</a>
            </li>
            {{-- <li class="nav-item">
              <a class="btn btn-singin" href="#">Download APK</a>
            </li> --}}
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row space-100">
        <div class="col-lg-6 col-md-12 col-xs-12">
          <div class="contents">
            <h2 class="head-title">Banjarmasin Aplikasi <br>Pasien Internal Kesehatan </h2>
            <p>Bisa mendaftarkan diri dan keluarga dimana saja dan kapan saja, klik tombol di bawah ini :</p>
            <a href="/login" class="btn btn-border-filled" style="width: 290px;"><i class="fas fa-edit"></i> PENDAFTARAN
              PASIEN ONLINE</a>
            <a href="#" class="btn btn-border" style="width: 290px;"><i class="fas fa-book"></i> BUKU PANDUAN</a>
            <div class="header-button">
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-xs-12 p-0">
          <div class="intro-img">
            <img src="/baapik/img/intro.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Header Section End -->

  <!-- Blog Section -->
  <section id="blog" class="section">
    <!-- Container Starts -->
    <div class="container">
      <!-- Start Row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="blog-text section-header text-center">
            <div>
              <h2 class="section-title">Daftar Puskesmas Yang Online</h2>
              <div class="desc-text">
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- End Row -->
      <!-- Start Row -->
      <div class="row">

        <!-- Start Col -->
        <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
          <!-- Blog Item Starts -->
          <div class="blog-item-wrapper">
            <div class="blog-item-text">
              <h3><a href="#"><i class="fas fa-hospital"></i> Banjarmasin Indah</a></h3>
              {{-- <p><i class="fas fa-map-marker-alt"></i> Jl ....</p>
              <p><i class="fas fa-phone"></i> Telp</p> --}}
              <p><i class="fas fa-clock"></i> 08:00 - 12:00</p>
            </div>
          </div>
          <!-- Blog Item Wrapper Ends-->
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
          <!-- Blog Item Starts -->
          <div class="blog-item-wrapper">
            <div class="blog-item-text">
              <h3><a href="#"><i class="fas fa-hospital"></i> Kayu Tangi</a></h3>
              {{-- <p><i class="fas fa-map-marker-alt"></i> Jl ....</p>
              <p><i class="fas fa-phone"></i> Telp</p> --}}
              <p><i class="fas fa-clock"></i> 08:00 - 12:00</p>
            </div>
          </div>
          <!-- Blog Item Wrapper Ends-->
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
          <!-- Blog Item Starts -->
          <div class="blog-item-wrapper">
            <div class="blog-item-text">
              <h3><a href="#"><i class="fas fa-hospital"></i> Sungai Mesa</a></h3>
              {{-- <p><i class="fas fa-map-marker-alt"></i> Jl ....</p>
              <p><i class="fas fa-phone"></i> Telp</p> --}}
              <p><i class="fas fa-clock"></i> 08:00 - 12:00</p>
            </div>
          </div>
          <!-- Blog Item Wrapper Ends-->
        </div>
        <!-- End Col -->
      </div>

      <div class="row">

        <!-- Start Col -->
        <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
          <!-- Blog Item Starts -->
          <div class="blog-item-wrapper">
            <div class="blog-item-text">
              <h3><a href="#"><i class="fas fa-hospital"></i> Sungai Jingah</a></h3>
              {{-- <p><i class="fas fa-map-marker-alt"></i> Jl ....</p>
              <p><i class="fas fa-phone"></i> Telp</p> --}}
              <p><i class="fas fa-clock"></i> 08:00 - 12:00</p>
            </div>
          </div>
          <!-- Blog Item Wrapper Ends-->
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
          <!-- Blog Item Starts -->
          <div class="blog-item-wrapper">
            <div class="blog-item-text">
              <h3><a href="#"><i class="fas fa-hospital"></i> Karang Mekar</a></h3>
              {{-- <p><i class="fas fa-map-marker-alt"></i> Jl ....</p>
              <p><i class="fas fa-phone"></i> Telp</p> --}}
              <p><i class="fas fa-clock"></i> 08:00 - 12:00</p>
            </div>
          </div>
          <!-- Blog Item Wrapper Ends-->
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
          <!-- Blog Item Starts -->
          <div class="blog-item-wrapper">
            <div class="blog-item-text">
              <h3><a href="#"><i class="fas fa-hospital"></i> Terminal</a></h3>
              {{-- <p><i class="fas fa-map-marker-alt"></i> Jl ....</p>
              <p><i class="fas fa-phone"></i> Telp</p> --}}
              <p><i class="fas fa-clock"></i> 08:00 - 12:00</p>
            </div>
          </div>
          <!-- Blog Item Wrapper Ends-->
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
  </section>
  <!-- blog Section End -->

  <!-- Footer Section Start -->
  <footer>
    <!-- Footer Area Start -->
    <section id="footer">
      <div class="copyright">
        <div class="container">
          <!-- Star Row -->
          <div class="row">
            <div class="col-md-12">
              <div class="site-info text-center">
                <p>Development by <a href="#" rel="nofollow">Diskominfotik</a></p>
              </div>

            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
      </div>
      <!-- Copyright End -->
    </section>
    <!-- Footer area End -->

  </footer>
  <!-- Footer Section End -->


  <!-- Go To Top Link -->
  <a href="#" class="back-to-top">
    <i class="lni-chevron-up"></i>
  </a>

  <!-- Preloader -->
  <div id="preloader">
    <div class="loader" id="loader-1"></div>
  </div>
  <!-- End Preloader -->

  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="/baapik/js/jquery-min.js"></script>

  <!-- The user is authenticated... -->

  <script>
    @if(Auth::check())
    $(function() { 
      console.log('sudah login');
        window.location.replace("{{ url('/user/home') }}");
    });
    @else
    
    console.log('belum login');
    function clickLogin() {
        var sso = new BjmSSO();
        sso.loginWindow(function(result) {
            console.log(result);
            if (result['status']) {
                sendToServer(result);
            }
        });
    }

    function sendToServer(result) {
        var user = result['data']['user']; 
        var token = result['data']['key'];
        var formData = new FormData();
        for ( var key in user ) {
            formData.append(key, user[key]);
        }
        formData.append('id_sso', user['id']);
        formData.append('token', token);
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            type: "POST",
            url: "https://baapik.banjarmasinkota.go.id/sso/register",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(data, textStatus, jqXHR) {
                    console.log(data);
                // $(".is-invalid").removeClass("is-invalid");
                if (data['status'] == true) {
                    window.location.replace("https://baapik.banjarmasinkota.go.id/user/home");
                    //location.reload();
                }
                else {
                    console.log(data['message']);
                    toastr.error(data['message']);
                    $("div").removeClass("loadingsso");
                }  
            },
            error: function(data, textStatus, jqXHR) {
                console.log(data);
                console.log('Login Gagal!');
            },
        });
    }

    $(function() { 
        @if (request('is_sso'))
        var sso = new BjmSSO();
        sso.login(function(result) {
            console.log(result);
            if (result['status']) {
                sendToServer(result);
            }
        });
        @endif
    });
    @endif
  </script>

  <script src="/baapik/js/popper.min.js"></script>
  <script src="/baapik/js/bootstrap.min.js"></script>
  <script src="/baapik/js/owl.carousel.js"></script>
  <script src="/baapik/js/jquery.nav.js"></script>
  <script src="/baapik/js/scrolling-nav.js"></script>
  <script src="/baapik/js/jquery.easing.min.js"></script>
  <script src="/baapik/js/nivo-lightbox.js"></script>
  <script src="/baapik/js/jquery.magnific-popup.min.js"></script>
  <script src="/baapik/js/main.js"></script>
</body>

</html>