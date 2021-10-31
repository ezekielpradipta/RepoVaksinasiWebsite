<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Puskesmas Purbalingga</title>
    <!-- LOADING STYLESHEETS -->
    <link href="{{asset('front/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid featured-area-white-border">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login-box border-right-1">
                        <a href="#">
                            <i class="fa fa-key"></i> Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TOP NAVIGATION -->
    <div class="container-fluid">
        <div class="navigation">
            <div class="row">
                <ul class="topnav">
                    <li></li>
                    <li>
                        <a href="/">
                            <i class="fa fa-home"></i> Pendaftaran Vaksinasi</a>
                    </li>
                    <li>
                        <a href="/cekstatus">
                            <i class="fa fa-book"></i> Cek Status Pendaftaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END TOP NAVIGATION -->
    <!-- SEARCH FIELD AREA -->
    <div class="searchfield bg-hed-six">
        <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="row text-center margin-bottom-20">
                <h1 class="white"> Puskesmas Purbalingga</h1>
                <span class="nested"> Alamat </span>
            </div>
            <br>
        </div>
    </div>
    <!-- END SEARCH FIELD AREA -->
    <!-- MAIN SECTION -->
    <div class="container featured-area-default padding-30">
        <div class="row">
            <!-- ARTICLE OVERVIEW SECTION -->
            <div class="col-md-8 padding-20">
                <div class="row">
                    <!-- BREADCRUMBS -->
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li>
                                <a href="/">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li class="active">Pendaftaran Vaksinasi</li>
                        </ol>
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- ARTICLES -->
                    <div class="fb-heading">
                        Formulir Pendaftaran vaksinasi
                    </div>
                    <hr class="style-three">
                    <form>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" placeholder="Masukan Nomor NIK KTP Anda">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap Anda">
                        </div>
                        <div class="form-group">
                            <label for="tempatlahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempatlahir" placeholder="Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label for="tgllahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgllahir">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>

                            <textarea class="form-control" rows="3" id="alamat"
                                placeholder="Masukan Alamat Anda"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan">
                        </div>
                        <div class="form-group">
                            <label for="nohp">Nomor Handphone/Whatsapp</label>
                            <input type="text" class="form-control" id="nohp"
                                placeholder="Masukan Nomor Handphone/Whatsapp Anda">
                        </div>
                        <div class="form-group">
                            <label for="jenisvaksin">Jenis Vaksin</label>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="namavaksin"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Pilih Jenis Vaksin
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Sinovac Dosis 1</a></li>
                                    <li><a href="#">Astra Dosis 2</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Check me out
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <!-- END ARTICLES -->

                </div>
            </div>
            <!-- END ARTICLES OVERVIEW SECTION-->
            <!-- SIDEBAR STUFF -->
            <div class="col-md-4 padding-20">
                <div class="fb-heading-small">
                    Jadwal Vaksinasi Hari ini
                </div>

                <div class="row margin-top-20">
                    <div class="col-md-12">
                        <div class="fb-heading-small">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>Sinovac Dosis 1</h3>
                                    <h5>Stock Vaksin : 100</h5>
                                    <h5>08:00-10:00</h5>
                                    <h5>Puskesmas Purbalingga</h5>
                                </div>
                            </div>
                        </div>
                        <hr class="style-three">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>Sinovac Dosis 2</h3>
                                <h5>Stock Vaksin : 200</h5>
                                <h5>10:00-12:00</h5>
                                <h5>Puskesmas Purbalingga</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SIDEBAR STUFF -->
    </div>
    </div>
    <!-- END MAIN SECTION -->


    <!-- COPYRIGHT INFO -->
    <div class="container-fluid footer-copyright marg30">
        <div class="container">
            <div class="pull-left">
                Puskesmas Purbalingga</a>
            </div>
        </div>
    </div>
    <!-- END COPYRIGHT INFO -->

    <!-- LOADING MAIN JAVASCRIPT -->
    <script src="{{ asset('front/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src='https://cdn.rawgit.com/VPenkov/okayNav/master/app/js/jquery.okayNav.js'></script>
</body>

</html>