<!DOCTYPE html>
<html lang="en">

<head>
  <title>VyHa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    @include('partials.nav');
  </nav>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/place-9.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h1 class="mb-3 bread">Liện hệ với chúng tôi</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="">Trang chủ <i class="ion-ios-arrow-forward"></i></a></span>
            <span>Liên hệ <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pb contact-section">
    <div class="container">
      <div class="row d-flex contact-info">
        <div class="col-md-3 d-flex">
          <div class="align-self-stretch box p-4 text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="icon-map-signs"></span>
            </div>
            <h3 class="mb-2">Địa chỉ</h3>
            <p>484 Hòa Quý, Ngũ Hành Sơn, Đà Nẵng</p>
          </div>
        </div>
        <div class="col-md-3 d-flex">
          <div class="align-self-stretch box p-4 text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="icon-phone2"></span>
            </div>
            <h3 class="mb-2">Điện thoại</h3>
            <p><a href="tel://1234567920">0336892064</a></p>
          </div>
        </div>
        <div class="col-md-3 d-flex">
          <div class="align-self-stretch box p-4 text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="icon-paper-plane"></span>
            </div>
            <h3 class="mb-2">Email</h3>
            <p><a href="mailto:info@yoursite.com">vyha@gmail.com</a></p>
          </div>
        </div>
        <div class="col-md-3 d-flex">
          <div class="align-self-stretch box p-4 text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="icon-globe"></span>
            </div>
            <h3 class="mb-2">Website</h3>
            <p><a href="#">vyhatravel.com</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section contact-section">
    <div class="container">
      <div class="row block-9">
        <div class="col-md-6 order-md-last d-flex">
          <!-- Success message -->
          @if(Session::has('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
          @endif
          <form action="#" method="POST" action="#" class="bg-light p-5 contact-form">
            @csrf
            <div class="form-group">
              <label>Tên</label>
              <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">

              <!-- Error -->
              @if ($errors->has('name'))
              <div class="error">
                {{ $errors->first('name') }}
              </div>
              @endif
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email"
                id="email">

              @if ($errors->has('email'))
              <div class="error">
                {{ $errors->first('email') }}
              </div>
              @endif
            </div>

            

            <div class="form-group">
              <label>Tiêu đề</label>
              <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                id="subject">

              @if ($errors->has('subject'))
              <div class="error">
                {{ $errors->first('subject') }}
              </div>
              @endif
            </div>

            <div class="form-group">
              <label>Tin nhắn</label>
              <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                rows="4"></textarea>

              @if ($errors->has('message'))
              <div class="error">
                {{ $errors->first('message') }}
              </div>
              @endif
            </div>
            <input type="submit" name="send" value="Gửi" class="btn btn-dark btn-block">
          </form>

        </div>

        <div class="col-md-6 d-flex">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.734025012025!2d108.2506520754446!3d15.975260284690707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4sIMSQ4bqhaSBo4buNYyDEkMOgIE7hurVuZw!5e0!3m2!1svi!2s!4v1732495979410!5m2!1svi!2s" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>

  @include('partials.page-footer')



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" /></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
  </script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>