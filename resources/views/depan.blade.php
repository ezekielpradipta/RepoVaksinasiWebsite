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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
</head>

<body>
    <div class="container-fluid featured-area-white-border">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login-box border-right-1">
                        <a href="/login">
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
                    <li class="icon">
                        <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
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
                    <form method="post" id="tambahpeserta" name="tambahpeserta" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" class="form-control" name="nik" id="nik" placeholder=" Masukan NIK Anda"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control " id="nama" name="nama"
                                placeholder="Masukan Nama Lengkap Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="tempatlahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempatlahir" name="tempatlahir"
                                placeholder="Tempat Lahir" required>

                        </div>
                        <div class="form-group">
                            <label for="tgllahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgllahir" name="tgllahir" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control " rows="3" name="alamat" id="alamat"
                                placeholder="Masukan Alamat Anda" require></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                placeholder="Pekerjaan" required>
                        </div>
                        <div class="form-group">
                            <label for="">No Hp/ Whatapps</label>
                            <input type="text" class="form-control" name="nohp" id="nohp"
                                placeholder="Masukan No HP Anda"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                            <label class="text-danger" id="vaksin_stock_error"></label>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Vaksin</label>
                            <select name="vaksin_id" id="vaksin_id" class="form-control" required>
                                <option disabled selected value>--Pilih Vaksin--</option>
                                @foreach($stocks as $stok)
                                <option value="{{ $stok->id }}">
                                    {{ $stok->vaksin_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" id="btn-save" class="btn btn-primary">Daftar</button>
                        </div>

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
                    <div class="col-md-12 vaksin-info">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url: "{{ route('isiHalaman') }}",
                type: "GET",
                dataType: "json",

                success: function (data) {
                    console.log(data);
                    for (var i = 0; i < data.stock.length; i++) {
                        var info= '<div class="fb-heading-small">'+
                            '<div class="small-box bg-green">'+
                               ' <div class="inner">' +
                                    '<h3>'+data.stock[i].vaksin_nama+' Dosis '+data.stock[i].vaksin_dosis+'</h3>'+
                                    '<h5> Stock: '+data.stock[i].vaksin_stock+'</h5>'+
                                   '<h5>'+data.stock[i].vaksin_sesi+'</h5>' +

                                '</div>'+
                            '</div>' +
                        '</div>'+
                        '<hr class="style-three">' +
                    '</div>';
                        $('.vaksin-info').append(info);
                    }
                }
            });
            $('#btn-save').click(function (e) {
            e.preventDefault();
            var myForm = $("#tambahpeserta")[0];
            $(this).html('Sending..');
            $.ajax({
                data: new FormData(myForm),
                url: "{{ route('tambahpeserta') }}",
                type: "POST",

                contentType: false,
                processData: false,
                success: function (data) {
                    Command: swal("Sukses", "Berhasil", "success");
                },
                error: function (data) {
                    Command: swal("Gagal", "Gagal ", "error");
                }
            });
        });

        });
    </script>
</body>

</html>