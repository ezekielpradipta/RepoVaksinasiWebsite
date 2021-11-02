@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Data Pasien Sudah Vaksinasi ')

@section('menu_pagina')
@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Laporan Data Pasien Sudah Vaksinasi</h3>
    </div>
    <div class=" box-body">
        <div class="table-responsive">
            <table id="pasientable" class="table table-bordered table-striped" style="width: 100%">
                <thead>
                    <th>no daftar</th>
                    <th>nik</th>
                    <th>nama</th>
                    <th>tanggal lahir</th>
                    <th>alamat</th>
                    <th>pekerjaan</th>
                    <th>nomor hp</th>
                    <th>jenis vaksin</th>
                    <th>validasi</th>
                    <th>tanggal vaksin</th>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">Informasi Data Pasien Vaksinasinasi</h3>
                <h4 class="modal-title text-center"> UTPD Puskesmas Purbalingga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form" name="form" enctype="multipart/form-data">
                    @csrf
                    <div class="alert alert-danger" style="display:none"></div>
                    <input type="hidden" name="pasien_id" id="pasien_id">

                        <div class="form-group">
                            <label for="nomordaftar">Nomor Pendaftaran</label>
                            <input type="text" class="form-control @error('nomordaftar') is-invalid @enderror" 
                            id="nomordaftar" name="nomordaftar" placeholder="Nomor Pendaftaran" readonly>

                            @error('nomordaftar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK KTP</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                            id="nik" name="nik" placeholder="Nomor NIK KTP" required>

                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                            id="nama" name="nama" placeholder="Nama Lengkap" required>

                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempatlahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempatlahir') is-invalid @enderror" 
                            id="tempatlahir" name="tempatlahir" placeholder="Tempat Lahir" readonly>

                            @error('tempatlahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgllahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tgllahir') is-invalid @enderror" 
                            id="tgllahir" name="tgllahir">

                            @error('tgllahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>

                            <textarea class="form-control @error('alamat') is-invalid @enderror" rows="3" id="alamat" name="alamat"
                                placeholder="Alamat" readonly></textarea>

                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" 
                            id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" readonly>

                            @error('pekerjaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nohp">Nomor Handphone/Whatsapp</label>
                            <input type="text" class="form-control @error('nohp') is-invalid @enderror" 
                            id="nohp" name="nohp" placeholder="Nomor Handphone/Whatsapp" readonly>

                            @error('nohp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="vaksin_id">vaksin_id</label>
                            <input type="text" class="form-control @error('nohp') is-invalid @enderror" 
                            id="vaksin_id" name="vaksin_id" placeholder="vaksin_id" readonly>

                            @error('vaksin_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="validasi">status</label>
                        <select id="validasi" name="validasi" class="form-control">
                            <option value="0">Belum Vaksin</option>
                            <option value="1">Sudah Vaksin</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" value="tambah" id="btn-save">Save data</button>

            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready( function () {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            var table = $('#pasientable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('pasien') }}",
                columns: [
                    { data: 'nomordaftar',  name: 'nomordaftar' },
                    { data: 'nik',  name: 'nik' },
                    { data: 'nama',  name: 'nama' },
                    { data: 'tgllahir',  name: 'tgllahir' },
                    { data: 'alamat',  name: 'alamat' },
                    { data: 'pekerjaan',  name: 'pekerjaan' },
                    { data: 'nohp',  name: 'nohp' },
                    { data: 'vaksin.vaksin_nama',  name: 'vaksin.vaksin_nama' },
                    { data: 'validasi',  name: 'validasi' },
                    { data: 'created_at',  name: 'created_at' },
                ]

            });
            $('#btn-save').click(function (e) {
                e.preventDefault();
                var myForm = $("#form")[0];
                $(this).html('Simpan');
                    $.ajax({
                        data: new FormData(myForm),
                        url: "{{ route('pasien.tambah') }}",
                        type: "POST",
                        
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            console.log(data);
                            $('#form').trigger("reset");
                            $('#modal-default').modal('hide');
                            Command: swal("Sukses", "Berhasil memperbaharui Data Pasien", "success");
                            table.draw();
                        },
                        error: function (data) {
                            console.log(data);
                            Command: swal("Gagal", "Gagal memperbaharui Data Pasien", "error");
                            
                            $('#saveBtn').html('Save Changes');
                        }
                    });
            });
            $('body').on('click', '.editItem', function () {
                var pasien_id = $(this).data('id');
                var url = "{{route('pasien')}}".concat("/" + pasien_id +"/edit");
                console.log(url);
                jQuery.ajax({
                     url :  url,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);  
                        $('#btn-save').val("Simpan");
                        $('#modal-default').modal('show');
                        $('#pasien_id').val(pasien_id);
                        $('#nomordaftar').val(data.nomordaftar);
                        $('#nik').val(data.nik);
                        $('#nama').val(data.nama);
                        $('#tempatlahir').val(data.tempatlahir);
                        $('#tgllahir').val(data.tgllahir);
                        $('#alamat').val(data.alamat);
                        $('#pekerjaan').val(data.pekerjaan);
                        $('#nohp').val(data.nohp);
                        $('#vaksin_id').val(data.vaksin_id);
                        $('#validasi').val(data.validasi);
                     }
                  });          
            });
        });
</script>
@endpush