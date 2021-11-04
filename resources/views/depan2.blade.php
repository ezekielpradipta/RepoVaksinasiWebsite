<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> {!! \App\Models\Config::find(1)->app_name_abv !!} | @yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset(\App\Models\Config::find(1)->favicon) }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <link href="{{ asset('custom/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#pendaftaran">Pendaftaran</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#cekstatus">Cek
                            Status</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">UTPD Puskesmas Purbalingga</h1>
        </div>
    </header>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="pendaftaran">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Pendaftaran Vaksinasi</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-pen"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row mb-3 info-vaksin">

            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Item 1-->
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
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">No Hp/ Whatapps</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" placeholder="Masukan No HP Anda"
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
                    <div class="text-center mt-3">
                        <button type="submit" id="btn-save" class="btn btn-primary">Daftar</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="cekstatus">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-search"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-4 ms-auto">
                    <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download
                        includes the complete source files including HTML, CSS, and JavaScript as well as optional SASS
                        stylesheets for easy customization.</p>
                </div>
                <div class="col-lg-4 me-auto">
                    <p class="lead">You can create your own custom avatar for the masthead, change the icon in the
                        dividers, and add your email address to the contact form to make it fully functional!</p>
                </div>
            </div>
            <!-- About Section Button-->
            <div class="text-center mt-4">
                <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/theme/freelancer/">
                    <i class="fas fa-download me-2"></i>
                    Free Download!
                </a>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        2215 John Daniel Drive
                        <br />
                        Clark, MO 65243
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About Freelancer</h4>
                    <p class="lead mb-0">
                        Freelance is a free to use, MIT licensed Bootstrap theme created by
                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                        .
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal show fade" id="modal-vaksin">
        <div class="modal-dialog text-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="pop-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3>Puskesmas Purbalingga</h3>
                    <h5>Alamat</h5>
                    <h5 id="modal_vaksin_vaksin"></h5>
                    <h5 id="modal_vaksin_nama"></h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="modal_vaksin_NIK" class="modal_vaksin_NIK">
                    <h5>Nomor Pendaftaran</h5>
                    <h1 id="modal_vaksin_nomor"></h1>
                    <h3>Tanggal</h3>
                    <h5 id="modal_vaksin_sesi"></h5>

                </div>
                <div class="modal-footer text-center">
                    <p>Perhatian</p>
                    <p>Wajib membawa nomor antrian</p>
                    <button type="button" class="btn btn-primary" value="tambah" id="btn-change-badge">Cetak</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Your Website 2021</small></div>
    </div>
    <script src="{{ asset('assets/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('custom/js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
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
                        var box = '<div class="col-lg-3 col-xs-6">'+
                    
                    '<div class="small-box bg-aqua">' +
                        '<div class="inner">' +
                            '<h5>'+data.stock[i].vaksin_nama+' Dosis '+data.stock[i].vaksin_dosis+'</h5>'+
                                    '<h5> Stock: '+data.stock[i].vaksin_stock+'</h5>'+
                                   '<h5>Sesi: '+data.stock[i].vaksin_sesi+'</h5>' +
                        '</div>'+
                    '</div>'+
                '</div>'
                $('.info-vaksin').append(box);
                    }
                }
            });
            $('#btn-save').click(function (e) {
            e.preventDefault();
            var bla = $('#nik').val();
            var myForm = $("#tambahpeserta")[0];
            $(this).html('Sending..');
            $.ajax({
                data: new FormData(myForm),
                url: "{{ route('tambahpeserta') }}",
                type: "POST",

                contentType: false,
                processData: false,
                success: function (data) {
                    
                    $('#modal_vaksin_NIK').val(bla);
                    Command: swal("Sukses", "Berhasil", "success");
                    
                    var url = "{{route('tambahpeserta')}}".concat("/" + bla);
                        $.ajax({
                            url: url,
                            type: 'GET',
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                var namavaksin = data.peserta.vaksin_nama + ' Dosis ' + data.peserta.vaksin_dosis;
                                $('#modal-vaksin').modal('show');
                                $('#modal_vaksin_nama').html(data.peserta.nama);
                                $('#modal_vaksin_nomor').html(data.peserta.nomordaftar);
                                $('#modal_vaksin_sesi').html(data.peserta.sesi);
                                $('#modal_vaksin_vaksin').html(namavaksin);
                            }
                        });

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