<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> {!! \App\Models\Website::find(1)->app_name !!}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset(\App\Models\Website::find(1)->favicon) }}" />
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
            <img src="{{ asset(\App\Models\Website::find(1)->puskesmas_image) }}"
                width="{{ \App\Models\Website::find(1)->puskesmas_image_size }}px" />
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
                <p>Keterangan:</p>
                <p>*Pastikan Data yang diisikan sudah benar</p>
                <p>*Jika mendapati kendala dapat menguhungi call center pada {!!
                    \App\Models\Website::find(1)->puskesmas_nohp !!}</p>
            </div>
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="cekstatus">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">Cek Status Pendaftaran</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-search"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="form-group">
                    <label for="">NIK/ Nomor Pendaftaran</label>
                    <input type="text" class="form-control" id="txt_name" />
                </div>
                <div class="text-center mt-3">
                    <button type="submit" id="btn-cek" class="btn bg-aqua btn-cek">Cek Status</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col">
                    <h4 class="text-uppercase mb-4">{!! \App\Models\Website::find(1)->puskesmas_name !!}</h4>
                    <p class="lead mb-0">
                        {!! \App\Models\Website::find(1)->puskesmas_alamat !!}
                    </p>
                    <p class="lead mb-0">
                        {!! \App\Models\Website::find(1)->puskesmas_email !!}
                    </p>
                    <p class="lead mb-0">
                        {!! \App\Models\Website::find(1)->puskesmas_nohp !!}
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal show fade" id="modal-vaksin">
        <input type="hidden" id="carinomer">
        <div class="modal-dialog text-center">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{ asset(\App\Models\Website::find(1)->puskesmas_image) }}" width="60px" />
                    <h3 id="modal_vaksin_puskesmas"></h3>
                    <h5 id="modal_vaksin_alamat"></h5>
                    <h5 id="modal_vaksin_vaksin"></h5>
                    <h5 id="modal_vaksin_nama"></h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="modal_vaksin_NIK" class="modal_vaksin_NIK">
                    <h5>Nomor Pendaftaran</h5>
                    <h1 id="modal_vaksin_nomor"></h1>
                    <h3 id="modal_vaksin_tanggal"></h3>
                    <h5 id="modal_vaksin_sesi"></h5>

                </div>
                <div class="modal-footer text-center">
                    <p>Perhatian</p>
                    <p>Wajib membawa nomor antrian</p>
                    <button type="button" class="btn btn-primary btn-cetak" value="tambah" id="btn-cetak">Cetak</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; {!! \App\Models\Website::find(1)->app_name !!}</small>
        </div>
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
                                
                                var namavaksin = data.peserta.vaksin_nama + ' Dosis ' + data.peserta.vaksin_dosis;
                                $('#modal-vaksin').modal('show');
                                $('#modal_vaksin_nama').html(data.peserta.nama);
                                $('#modal_vaksin_nomor').html(data.peserta.nomordaftar);
                                $('#modal_vaksin_sesi').html(data.peserta.sesi);
                                $('#modal_vaksin_vaksin').html(namavaksin);
                                $('#modal_vaksin_tanggal').html(data.parse);
                                $('#modal_vaksin_puskesmas').html(data.website.puskesmas_name);
                                $('#modal_vaksin_alamat').html(data.website.puskesmas_alamat);
                            }
                        });

                },
                error: function (data) {
                    Command: swal("Gagal", "Gagal ", "error");
                }
            });
         });
         $('body').on('click','.btn-cetak',function(){
              var bla = $('#modal_vaksin_NIK').val();
              var url = "{{route('depan')}}".concat("/cetak/" + bla );
              
              $.ajax({
                      url: url,
                      type: 'GET',
                      success: function(response){
                        window.location = url;
                      }
                    });
            });
            $('body').on('click','.btn-cek',function(){
                var bla = $('#txt_name').val();
              
              var url = "{{route('tambahpeserta')}}".concat("/cekstatus/" + bla );
              
              $.ajax({
                      url: url,
                      type: 'GET',
                    dataType: "json",
                      success: function(data){
                                $('#modal_vaksin_NIK').val(data.peserta.nik);
                        
                                var namavaksin = data.peserta.vaksin_nama + ' Dosis ' + data.peserta.vaksin_dosis;
                                $('#modal-vaksin').modal('show');
                                $('#modal_vaksin_nama').html(data.peserta.nama);
                                $('#modal_vaksin_nomor').html(data.peserta.nomordaftar);
                                $('#modal_vaksin_sesi').html(data.peserta.sesi);
                                $('#modal_vaksin_vaksin').html(namavaksin);
                                $('#modal_vaksin_tanggal').html(data.parse);
                                $('#modal_vaksin_puskesmas').html(data.website.puskesmas_name);
                                $('#modal_vaksin_alamat').html(data.website.puskesmas_alamat);

                      }
                      error: function (data) {
                            Command: swal("Gagal", "Gagal ", "error");
                        }
                    });
            });
        });
    </script>
</body>

</html>