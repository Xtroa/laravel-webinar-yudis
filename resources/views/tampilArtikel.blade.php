<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artikel Yudis - News</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LARAVEL YUDIS</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }} ">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<style>
    .headImage {
       border: 1px solid #DDDDDD;
       position: relative;
    }
    .headMenu {
       position: absolute;
       left: 0px;
       top: 0px;
       width: 100%;
       opacity: 100%;
       border: none!important;
    }
</style>
<body>
    <header>
        <img class="headImage"src='{{ asset('storage/gambar/bghead_artikel.jpg') }}' style="width: 100%; height: 480px;"></img>

        <!-- Image and text -->
        <nav class="navbar navbar-light bg-transparent headMenu">
            <div class="container">
                <a class="navbar-brand " style="outline: none; border: none; box-shadow: none;">
                <img src="{{ asset('storage/gambar/headIcon.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                <h2 style="color: white;">Artikel Yudis</h2>
                </a>
                <div>
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->level == 'admin')
                            <a style="color: white;" href="{{ url('/news') }}">Artikel</a>
                            <a style="margin-left: 20px;color: white;" href="{{ url('/home') }}">Dashboard</a>
                            <a style="margin-left: 20px; color: white;" >Hi, {{ Auth::user()->name }}</a>
                            <a style="margin-left: 20px;color: white;" href="{{ url('/logout') }}">Logout</a>
                        @else
                            <a style="margin-left: 20px;color: white;" href="{{ url('/news') }}">Artikel</a>
                            <a style="margin-left: 20px;color: white;" href="{{ url('/logout') }}">Logout</a>
                        @endif
                    @else
                        <span class="navbar-text">
                            <a style="color: white;" href="{{ url('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a style="margin-left: 20px;color: white;" href="{{ route('register') }}">Register</a>
                            @endif
                        </span>
                    @endauth
                @endif
                </div>
            </div>
        </nav>
    </header>

    <div class="container main" >


        <h3 style="margin-top: 20px;">Daftar Artikel : </h3>
            <div class="bd-example">

                <div class="card-deck">
                    @if ($artikel->count() > 0 )
                        @foreach ($artikel as $data)
                        <div class="row col-md-4" style="margin-top: 30px; margin-bottom: 20px">
                        <a href="/news/{{ $data->slug }}">
                            <div class="card">
                                {{-- <img src="{{ asset('storage/' .$data->thumbnail) }}" width="150px" alt=""></td> --}}
                                <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" src="{{ asset('storage/' .$data->thumbnail) }}" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                <div class="card-body">
                                    <h5  class="card-title" style="height:50px;">{{ $data->title }}</h5>

                                    <p class="card-text" style="height:100px;">{{ substr($data->excerpt, 0, 125) }}</p>
                                {{-- <p class="card-text">{{ $data->excerpt }}</p>
                                <h5 class="card-title">{{ $data->title }}</h5> --}}
                                </div>
                                <div class="card-footer">
                                    <small class="card-text" >{{ $data->created_at->format('d F Y ') }}, oleh : {{ $data->user->name }} </small>
                                </div>
                            </div>
                        </a>
                        </div>
                        @endforeach
                    @else
                    <div style="text-align: center; margin-top: 50px; margin-bottom: 80px;">
                        <div class="alert alert-warning ">
                            <strong>Maaf. </strong> Data Artikel belum tersedia untuk saat ini.
                        </div>
                    </div>

                    @endif


                </div>

            </div>
            <div class="pagination justify-content-center" style="margin-top: 30px; margin-bottom: 30px;">
                {{ $artikel->links() }}
            </div>

    </div>

    <div class="row" style="background-color: dimgray; opacity: 0.7; filter: alpha(opacity=50);">
        <div class="col-sm-4" style="margin-left: 15%; margin-top: 20px;">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Contact</h5>
              <p class="card-text">Email : ywibisono24@gmail.com</p>
              <p class="card-text">(+62) 85156935120)</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4" style="margin-top: 20px;">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Digunakan untuk</h5>
              <p class="card-text">Pengumpulan Proyek Webinar Teknologi "Laravel Framework"</p>
            </div>
          </div>
        </div>
      </div>

</body>
</html>
