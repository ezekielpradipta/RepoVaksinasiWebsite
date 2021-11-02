@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Data Vaksin ')

@section('menu_pagina')
@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Data Vaksin</h3>
    </div>
    <div class=" box-body">
        <div class="table-responsive">
            <table id="dt" class="table table-bordered table-striped" style="width: 100%">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Dosis</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">Informasi Vaksin</h3>
                <h4 class="modal-title text-center"> UTPD Puskesmas Purbalingga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form" name="form" enctype="multipart/form-data">
                    @csrf
                    <div class="alert alert-danger" style="display:none"></div>
                    <input type="hidden" name="vaksin_id" id="vaksin_id">

                    <div class="form-group">
                        <label for="">Nama Vaksin</label>
                        <input type="text" name="vaksin_nama" class="form-control" id="vaksin_nama"
                            placeholder="Nama Vaksin" readonly>
                        <label class="text-danger" id="vaksin_nama_error"></label>
                    </div>
                    <div class="form-group">
                        <label for="">Dosis Vaksin</label>
                        <input type="text" name="vaksin_dosis" class="form-control" id="vaksin_dosis"
                            placeholder="Nama Vaksin" readonly>

                    </div>
                    <div class="form-group">
                        <label for="">Stok Vaksin</label>
                        <input type="text" class="form-control" name="vaksin_stock" id="vaksin_stock"
                            placeholder="Stok Vaksin"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                        <label class="text-danger" id="vaksin_stock_error"></label>
                    </div>
                    <div class="form-group">
                        <label for="">Sesi Vaksin</label>
                        <input type="radio" name="vaksin_sesi" value="1" id="vaksin_sesi1">08:00 - 10:00 WIB
                        <input type="radio" name="vaksin_sesi" value="2" id="vaksin_sesi2">10:00 - 12:00 WIB
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select id="vaksin_status" name="vaksin_status" class="form-control">
                            <option value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>
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
            var table = $('#dt').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('vaksin') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'vaksin_nama',  name: 'vaksin_nama' },
                    { data: 'vaksin_dosis',  name: 'vaksin_dosis' },
                    { data: 'vaksin_stock',  name: 'vaksin_stock' },
                    { data: 'vaksin_status',  name: 'vaksin_status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false},
                ]

            });
            $('#btn-save').click(function (e) {
                e.preventDefault();
                var myForm = $("#form")[0];
                $(this).html('Simpan');
                    $.ajax({
                        data: new FormData(myForm),
                        url: "{{ route('vaksin.tambah') }}",
                        type: "POST",
                        
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            console.log(data);
                            $('#form').trigger("reset");
                            $('#modal-default').modal('hide');
                            Command: swal("Sukses", "Berhasil Memperbaharui Data Vaksin", "success");
                            table.draw();
                        },
                        error: function (data) {
                            console.log(data);
                            Command: swal("Gagal", "Gagal Memperbaharui Data Vaksin", "error");
                            
                            $('#saveBtn').html('Save Changes');
                        }
                    });
            });
            $('body').on('click', '.editItem', function () {
                var vaksin_id = $(this).data('id');
                var url = "{{route('vaksin')}}".concat("/" + vaksin_id +"/edit");
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
                        $('#vaksin_id').val(vaksin_id);
                        
                        $('#vaksin_nama').val(data.vaksin_nama);
                        $('#vaksin_stock').val(data.vaksin_stock);
                        $('#vaksin_status').val(data.vaksin_status);
                        $('#vaksin_dosis').val(data.vaksin_dosis);
                       if(data.vaksin_sesi=="1"){
                        $('#vaksin_sesi1').prop('checked',true);
                       } else{
                        $('#vaksin_sesi2').prop('checked',true);
                       }
                     }
                  });          
            });
        });
</script>
@endpush